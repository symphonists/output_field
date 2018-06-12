# Output Field

This extension for [Symphony CMS][1] extends the default input field and offers an optimized data source output for mail addresses and URIs.

## 1. Mail address 

**Example output:**

```xml
<mailaddress alias="sam.symphonian" domain="getsymphony.com" hash="9a6ea6ecaa6ce46c0dcfb8415993e638">
	sam.symphonian@getsymphony.com
</mailaddress>
```

**Output parameters:**

- alias 
- domain
- hash (useful for Gravatar integration)

## 2. URI

**Example Output:**

```xml
<website scheme="http" host="getsymphony.com">http://getsymphony.com</website>
```

**Output parameters:**

- scheme, e.g. `http`
- host
- port
- user
- pass
- path
- query, after the question mark `?`
- fragment, after the hashmark `#`

[See PHP documentation for details][2]


[1]: https://github.com/symphonycms
[2]: http://de.php.net/manual/en/function.parse-url.php