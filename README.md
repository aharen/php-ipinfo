# php-ipinfo
Simple class for [ipinfo.io](http://ipinfo.io) API

## How to Use

Include the file 

```php

include_once('ipinfo.php');

```

### Return all details for your IP Address. 

Not specifying an IP Address will return details of the scripts host IP Address.


```php

$ipinfo = new ipinfo();
print_r($ipinfo->fetch());

```

### Return all the details about an IP Address. 

Will return an object with the information about the provided IP Address.


```php

$ipinfo = new ipinfo('8.8.8.8');
print_r($ipinfo->fetch());

```

Output

```php

stdClass Object
(
    [ip] => 8.8.8.8
    [hostname] => google-public-dns-a.google.com
    [city] => Mountain View
    [region] => California
    [country] => US
    [loc] => 37.3860,-122.0838
    [org] => AS15169 Google Inc.
    [postal] => 94035
)

```

### Fetch only a specefic detail

Will only return the specified detail from the object.

```php

$ipinfo = new ipinfo();

/* Fetch hostname */
print_r($ipinfo->fetch()->hostname);

/* Fetch city */
print_r($ipinfo->fetch()->city);

/* Fetch region */
print_r($ipinfo->fetch()->region);

/* Fetch country */
print_r($ipinfo->fetch()->country);

/* Fetch location */
print_r($ipinfo->fetch()->loc);

/* Fetch organization */
print_r($ipinfo->fetch()->org);

/* Fetch postal */
print_r($ipinfo->fetch()->postal);

```