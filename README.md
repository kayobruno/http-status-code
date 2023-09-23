## Http Status Code

The "HTTP Status Code Abstraction" project is a PHP 8-based initiative aimed at simplifying the management and usage of HTTP status codes by **ENUM**. HTTP status codes are integral to web development, providing vital information about the success or failure of HTTP requests and responses. However, managing and referencing these status codes in a clear and organized way can often be tedious and time-consuming.. This project seeks to address this challenge by leveraging PHP 8's ENUM feature.

Status codes are divided into **five main categories**, each with its own range of numbers to indicate different types of responses.

#### Informational
- Codes in this category start with "1" (for example, 100, 101).
- They are used to inform the client that the request has been received and is being processed.

#### Successful
- Codes in this category start with "2" (for example, 200, 201).
- They indicate that the request has been received, understood, and accepted successfully.

#### Redirection
- Codes in this category start with "3" (for example, 301, 302).
- They are used to indicate that the client should take some additional action to complete the request.

#### Client Errors
- Codes in this category start with "4" (for example, 400, 404).
- They indicate that there was an error in the request made by the client, either due to a syntax error, insufficient permissions, or resources not found.

#### Server Errors
- Codes in this category start with "5" (for example, 500, 502).
- They indicate that there was an error on the server while processing the request, typically due to internal server failures.

### Examples

``` 
echo HttpStatusCode::OK->value; // 200
echo HttpStatusCode::OK->isSuccess(); // true
echo HttpStatusCode::OK->category(); // HttpStatusCodeCategory::SUCCESSFUL
echo HttpStatusCode::OK->description(); // The request has succeeded
```

This project is an open-sourced software licensed under the [MIT license](https://opensource.org/license/mit/).