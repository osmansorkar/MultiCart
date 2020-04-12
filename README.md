# magento2 Multi Vendor Module / MultiCart
Try To create Magento 2 Multi Vendor Module- Now it is only developer version. 

Current Features
--------

<ul>
  <li>No core files changed.</li>
  <li>Admin can set default ROLE for vendor from configuration.</li>
  <li>Separate section for Vendor Profile</li>
  <li>Vendors/Sellter can create all different types of products which are supported by Magento from their Vendor panel.</li>
  <li>Vendors/Sellter Only see own products / Admin Can See All products</li>
  <li>Vendors can export all their products in a CSV file.</li>
</ul>

Upcoming Features
--------

<ul>
  <li>Different commission rates for different vendors</li>  
  <li>Admin can ask for Verification Proof from vendors while registering them in store.</li>
  <li>Admin can manually or automatically approve Vendors and their products as required.</li>
  <li>Notification email to seller when his product gets sold</li>
</ul>

# Install Process

1. Install Manually
---
<ol>
  <li>Create directory in app\code\OsmanSorkar\MultiCart</li>  
  <li>Clone This repository on created directory </li>
  <li>Active This Module by run in terminal from Magento root directory bin/magento module:active OsmanSorkar_MultiCart</li>
  <li>run "bin/magento setup:upgrade" in terminal</li>
  <li>Have to Create a Selleter/Vendor role and Have to set from default seller/vendor role from settings</li>
</ol>


Login/ Registration URl
--------
**Seller Account Sign Up Url:** wwwo.domain.xx/seller/account/create/

**Seller Login :** Same as Admin login url - wwwo.domain.xx/adminxxx

##  Contributing, Issues & Pull Requests

Feel free to create issues to request new features or to report bugs & problems. Just please follow the template given when creating the issue.

Pull requests are welcome. Unless a small tweak, It may be best to open the pull request early or create an issue for your intended change to discuss how it will fit in to the project and plan out the merge. Just because a feature request exists, or is tagged, does not mean that feature would be accepted into the core project.

Pull requests should be created from the `master` branch since they will be merged back into `master` once done. 

## Support Magento Version 

This Module last update by using Magento ver. 2.3.4