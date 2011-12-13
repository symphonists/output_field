# Output Field

Advanced data source output for mail addresses and URIs in input fields.

## Documentation

This extension extends Symphony's standard input field an offers a different data source output for mail addresses and URIs.

**Mail address** 

	<mailaddress alias="sam.symphonian" domain="symphony-cms.com" hash="9a6ea6ecaa6ce46c0dcfb8415993e638">
		sam.symphonian@symphony-cms.com
	</mailaddress>

- alias 
- domain
- hash (useful for Gravatar integration)

**URI** ([see PHP documentation](http://de.php.net/manual/en/function.parse-url.php))

    <website scheme="http" host="symphony-cms.com">http://symphony-cms.com</website>

- scheme, e.g. `http`
- host
- port
- user
- pass
- path
- query, after the question mark `?`
- fragment, after the hashmark `#`
