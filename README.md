# LMS Client

Integration with LMS services.

Currently, only `/search` and `/details` LMS endpoints are supported.

## Installation

In your `composer.json` file, edit or create `repositories` section
where reference the repository:
```
"repositories": {
    "lms-client": {
        "type": "vcs",
        "url": "git@github.com:AnatolyMuntean/lms-client.git"
    }
},
```

Now, add the library via composer:

`composer require inleadmedia/lms-library:dev-development`

## Usage

After installation the library can be referenced from the `\LMS` namespace.

Since LMS connectivity is made through HTTP(S), a http transport is required.
No transport is shipped with LMS library, however creating one is simple
and straighforward.

The reason why LMS lacks any http transport implementations is the freedom
of using of any approach when sending requests - cURL, Guzzle, plain
`file_get_contents`, or, whatever implementation might exist for a certain
situation, environment or framework.

The respective interface incapsulates the one and only `request`
method eager for implementation, which executes http communication.

In the following example, it is assumed that Guzzle library is used to perform 
HTTP requests:

```php
use LMS\Client\HttpTransportInterface;

class GuzzleTransport implements HttpTransportInterface {
    /**
     * HTTP client.
     *
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * GuzzleTransport constructor.
     */
    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }

    /**
     * {@inheritdoc}
     */
    public function request($method, $url, array $payload = [], array $headers = [])
    {
        // Catch any Guzzle related exceptions here and re-throw \LMS\Exception\LmsException.
        $result = $this->client->request(
            $method,
            $url,
            [
                'query' => $payload,
                'headers' => $headers,
            ]
        );

        // Make sure it returns an array with 'code' and 'data' keys.
        return [
            'code' => $result->getStatusCode(),
            'data' => $result->getBody()->getContents(),
        ];
    }
}
```

Please note that the implemented method should return an array where `code` and 
`data` keys are mandatory.

### Searching

Performs a search request towards LMS.

To create a search request, instantiate a `LMS\Request\Search` object.

```php
use LMS\Exception\LmsException;
use LMS\Request\Details as DetailsRequest;
use LMS\Request\Search as SearchRequest;

// The http transport.
$httpTransport = new GuzzleTransport();

// LMS client instance.
$lmsClient = new Client($httpTransport);

// Set the LMS endpoint. Omit the trailing slash.
$lmsClient->setUrl('https://v3.lms.inlead.ws/slagbib');

// Instantiate a search request object.
// Search for query 'harry', starting from page '1', with '10' items per page,
// includes metadata in result.
$searchRequest = new SearchRequest('harry', 1, 10, true);
try {
    $rawLmsResult = $lmsClient->execute($searchRequest);
    /** @var \LMS\Result\SearchResultInterface $searchResult */
    $searchResult = $searchRequest->parseResult($rawLmsResult);

    // The amount of items in the result.
    $searchResult->getCount();
    // Total hit-count for the respective query.
    $searchResult->getHits();
    // A set of result items, as \LMS\Object\SearchObject
    $searchResult->getObjects();

    // First object title.
    $searchResult->getObjects()[0]->title;
}
catch (LmsException $exception) {
    // Do something...
}
```

### Item details

Performs a request for item details towards LMS.

To create a details request, instantiate a `LMS\Request\Details` object.

```php
use LMS\Exception\LmsException;
use LMS\Request\Details as DetailsRequest;
use LMS\Request\Search as SearchRequest;

// The http transport.
$httpTransport = new GuzzleTransport();

// LMS client instance.
$lmsClient = new Client($httpTransport);

// Set the LMS endpoint. Omit the trailing slash.
$lmsClient->setUrl('https://v3.lms.inlead.ws/slagbib');

// Instantiate a details request.
// '870970-basis:54129262' - is the item id.
$detailsRequest = new DetailsRequest('870970-basis:54129262');
try {
    $rawLmsResult = $lmsClient->execute($detailsRequest);

    /** @var \LMS\Result\DetailsResultInterface $detailsResult */
    $detailsResult = $detailsRequest->parseResult($rawLmsResult);

    /** @var \LMS\Object\SearchObject $object */
    $object = $detailsResult->getObject();

    // Object title.
    $object->title;

    // Object meta.
    $object->meta;
}
catch (LmsException $exception) {
    // Do something...
}
```
