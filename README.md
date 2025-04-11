- [KaPHPir](#kaphpir)
- [How to use](#how-to-use)
  - [1 Response structure](#1-response-structure)
  - [2 Sending a response](#2-sending-a-response)
  - [3 Adding metadata](#3-adding-metadata)
  - [4 Settings](#4-settings)
  - [5 HTTP Headers](#5-http-headers)
  - [6 Serializers](#6-serializers)


# KaPHPir

KaPHPir is a PHP implementation of the [Kiwi API Response Format](https://www.mia.kiwi/projects/kiwi.mia.kcs.0001) by the Kiwi Committee for Standardization.

It can use any serialization method, but a JSON serializer is included by default so you can start working as fast as possible.

KaPHPir currently supports the following format versions:

- 25.1.0

# How to use

## 1 Response structure

The structure of the `Response` object is defined in the Kiwi API Response Format (KAPIR) specification. Here's an overview of that format in JSON:

```json
{
    "status": "success" | "error",
    "version": string,
    "data": any,
    "message": string | null,
    "error": error object | null,
    "metadata": object | null
}
```

- The `status` member stores the status of the request: successful or failed.
- The `version` member stores the version of the format used. For now, version 25.1.0 is the only available. This implementation doesn't support non-standard formats yet.
- The `data` member can be any type of data, it stores the main content of the response i.e. the information to return to the client after their request.
- The `message` member stores a message destined to the consumer about the request of response.
- The `error` member stores the error(s) encountered while treating the request. It follows a specific format described below.
- The `metadata` member stored additional data about the request, the response, or something else. It can be disabled in the settings.

The `error` structure looks like this:

```json
{
    "code": string,
    "message": string | null,
    "errors": array of nested errors
}
```

- The `code` member stores a unique string used to identify the error.
- The `message` member stores additional information about the error.
- The `errors` member stores nest errors that follow the format below:
 
```json
{
    "code": string,
    "message": string | null
}
```

## 2 Sending a response

If the request was treated successfully, you can send a response using the following code:

```php
use \MiaKiwi\Kaphpir\Responses\v25_1_0\Response;
use \MiaKiwi\Kaphpir\ApiResponse\HttpApiResponse;
use \MiaKiwi\Kaphpir\ResponseSerializer\JsonResponseSerializer;

$user = [
    "id" => 1,
    "name" => "John Doe",
    "email" => "john@example.com"
];

// Create a response instance
$response = (new Response())->success()
                            ->data($user)
                            ->message("User with ID '" . $user["id"] . "' found!");
                            
// Send the response in JSON format over HTTP
HttpApiResponse::send(
    JsonResponseSerializer::getInstance(),
    $response,
    httpStatus: 200 // The status code to be sent to the user
);
```

If the request failed however, you can use:

```php
use \MiaKiwi\Kaphpir\Responses\v25_1_0\Response;
use \MiaKiwi\Kaphpir\ApiResponse\HttpApiResponse;
use \MiaKiwi\Kaphpir\ResponseSerializer\JsonResponseSerializer;
use \MyApp\Exceptions\UserNotFound;

$user_id = $_GET['id'];

$response = (new Response())->error(new UserNotFound())
                            ->message("User with ID '" . $user_id . "' not found.");
                            
// Send the response. If the object passed to the `error()` method extends `\MiaKiwi\Kaphpir\Errors\Http\HttpError`, the API response will automatically detect the appropriate HTTP status code.
HttpApiResponse::send(
    JsonResponseSerializer::getInstance(),
    $response
);
```

## 3 Adding metadata

You can add metadata to your responses to provide additional information to the user. For example, you can add some pagination information:

```php
use \MiaKiwi\Kaphpir\Responses\v25_1_0\Response;
use \MiaKiwi\Kaphpir\ApiResponse\HttpApiResponse;
use \MiaKiwi\Kaphpir\ResponseSerializer\JsonResponseSerializer;

$colours = [
    "red",
    "green",
    "blue",
    "#299FFF"
];

$response = (new Response())->success()
                            ->data($colours)
                            ->metadata([
                                "pagination" => [
                                    "total_count" => count($colours),
                                    "per_page" => count($colours),
                                    "page" => 1,
                                    "total_pages" => 1
                                ]
                            ]);
                            
HttpApiResponse::send(
    JsonResponseSerializer::getInstance(),
    $response
);
```

## 4 Settings

You can use settings to customize your responses, either globally by using the `DefaultSettings` singleton or locally (e.g. for a specific endpoint) by using the `Settings` class.

If no settings are specified for a response, then the `DefaultSettings` singleton applies.

The default settings used by responses are:
| Name                                      | Default value    | Purpose                                                                                                             |
| ----------------------------------------- | ---------------- | ------------------------------------------------------------------------------------------------------------------- |
| `response.metadata.enabled`               | `true`           | Enable or disable the metadata member of the response. When disabled, the metadata is null.                         |
| `response.metadata.response_id.enabled`   | `true`           | Includes the response ID in the metadata. Applies only to implementations that include a response ID.               |
| `response.metadata.response_time.enabled` | `true`           | Adds the time the response was generated. More specifically, the time the datetime value was added to the metadata. |
| `response.metadata.response_time_format`  | `"Y-m-d H:i:sP"` | The format used by the `repsonse_time` metadata.                                                                    |
| `response.metadata.default`               | `[]`             | The default metadata value.                                                                                         |
| `http.headers.kapir-version.enabled`      | `true`           | Toggles the `Kapir-Version` HTTP header on and off.                                                                 |

You can apply or edit settings like this:

```php
...
use \MiaKiwi\Settings\Settings;

// Disable the metadata on all responses from the fruits endpoint
$fruits_endpoint_settings = new Settings([
    'response.metadata.enabled' => false
]);

$response = new Response(settings: $fruits_endpoint_settings);

...
```


You can edit the default settings for all responses like this:

```php
...
use \MiaKiwi\Settings\DefaultSettings;

// Hide the response ID from the metadata for all responses.
DefaultSettings::getInstance()->setSetting('response.metadata.response_id.enabled', false);

...
```

You can also read the value of a setting:

```php
...
use \MiaKiwi\Settings\DefaultSettings;

// Check if metadata are enabled
$metadata_enabled = DefaultSettings::getInstance()->getSetting('response.metadata.enabled');

// Get a default value if the setting doesn't exist
$can_ducks_fly = DefaultSettings:getInstance()->getSetting('ducks.abilities.flight', false);

...
```

## 5 HTTP Headers

By default, the `HttpApiResponse` class applies two HTTP headers: `Content-Type` and `Kapir-Version`. The `Content-Type` header is set to the MIME type returned by the serializer used, and `Kapir-Version` is set to the version of the `Response` class used. They cannot be overridden.

The `Kapir-Version` header can be disabled using the `http.headers.kapir-version.enabled` setting:

```php
...
use \MiaKiwi\Kaphpir\ApiResponse\HttpApiResponse;
use \MiaKiwi\Kaphpir\ResponseSerializer\JsonResponseSerializer;
use \MiaKiwi\Kaphpir\Settings\Settings;

$settings = new Setting([
    'http.headers.kapir-version.enabled' => false
]);

HttpApiResponse::send(
    JsonResponseSerializer::getInstance(),
    $response,
    $settings
);
...
```

You can also include additional headers like this:

```php
...
use \MiaKiwi\Kaphpir\ApiResponse\HttpApiResponse;
use \MiaKiwi\Kaphpir\ResponseSerializer\JsonResponseSerializer;

HttpApiResponse::send(
    JsonResponseSerializer::getInstance(),
    $response,
    headers: [
        'X-Powered-By': 'My hopes and dreams'
    ]
);
...
```

## 6 Serializers

Serializers are fed to the API response object and, well..., serialize the data. A built-in JSON serializer is included with Kaphpir, but you are free to implement your own or extend ours.

Here's an example of how to implement a new serializer:

```php
use \MiaKiwi\Kaphpir\ResponseSerializer\IResponseSerializer;
use \MiaKiwi\Kaphpir\Responses\IResponse;

class UselessResponseSerializer implements IResponseSerializer
{
    private static ?self $instance = null;

    protected static string $mimeType = 'text/plain';



    private function __construct()
    {
        // Constructor is private to prevent instantiation from outside the class.
    }



    /**
     * Returns the serializer object instance.
     * @return self
     */
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }



    /**
     * Returns the MIME type of the serialization format.
     * @return string
     */
    public static function getMimeType(): string
    {
        return self::$mimeType;
    }



    /**
     * Serializes the response object to a string.
     * @param \MiaKiwi\Kaphpir\Responses\IResponse $response
     * @param \MiaKiwi\Kaphpir\Settings\Settings|null $settings
     * @return void
     */
    public static function serialize(IResponse $response, ?Settings $settings = null): string
    {
        return "Thanks for your data, it's mine now :>";
    }
}
```