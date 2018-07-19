[![Latest Stable Version](https://poser.pugx.org/mslwk/module-catalog-mode/v/stable)](https://packagist.org/packages/mslwk/module-catalog-mode)
[![License](https://poser.pugx.org/mslwk/module-catalog-mode/license)](https://packagist.org/packages/mslwk/module-catalog-mode)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/maciejslawik/catalog-mode-magento2/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/maciejslawik/catalog-mode-magento2/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/maciejslawik/catalog-mode-magento2/badges/build.png?b=master)](https://scrutinizer-ci.com/g/maciejslawik/catalog-mode-magento2/build-status/master)

# Magento 2 CatalogMode module #

The extension allows you to enable catalog mode for a store view or website via admin panel.
When in catalog mode, customers cannot purchase products but still can browse your products
and add them to wishlist.

It is perfect for multilang websites which what to sell products only to a single country but
allow customers to browse the inventory in their native language and purchase products in brick-and-mortar
stores.

### Installation ###

##### Via Composer #####

To install the extension using Composer use the 
following commands:

```bash
 composer require mslwk/module-catalog-mode
 php bin/magento module:enable MSlwk_CatalogMode
 php bin/magento setup:upgrade
 ```
 
##### From GitHub #####
 
You can download the extension directly from GitHub and 
put it inside `` app/code/MSlwk/CatalogMode `` directory. Then run the
following commands:

```bash
php bin/magento module:enable MSlwk_CatalogMode
php bin/magento setup:upgrade
```
 
## Usage ##
To enable Catalog Mode head to your administration panel and head to
 ```
Stores -> Configuration -> Catalog -> Catalog Mode -> Catalog Mode enabled
```
The section is protected using ACLs, so you might have to adjust your ACL configuration
to change this setting.