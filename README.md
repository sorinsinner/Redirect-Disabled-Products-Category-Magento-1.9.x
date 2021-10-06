# Redirect Disabled Products to their Category for Magento-1.9.x

Magento 1.9.x extension to automatically redirect a disabled product to it's subcategory. It chooses the deepest category/subcategory automatically.
Tested with Magento 1.9.3.x +. It should work on all Magento 1.9.x installations.

## Why?
Was a requirement from a past client and figured it might help others too.
I must say that if you're disabling products that you know that are never going to get back in stock, it's probably better to just delete them and manage the 404 errors to avoid bloating the store. Your call.

## What kind of redirect does it make?
The extension creates a 302 temporary redirect to the category. (notify search engines that it is a temporary redirect)
If you wish for it to make 301 permanent redirects, you need to replace 302 with 301 in file Observer.php at line 24. And that's it.

## How to install?
Just as any Magento 1.9.x extension.
