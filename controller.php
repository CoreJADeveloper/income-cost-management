<?php
$inventory_management_helper = new InventoryManagementHelper();

$root_url = $inventory_management_helper->income_cost_management_root_url();

if(isset($_GET['page']) && ($_GET['page'] == 'login')) {
  income_cost_management_login_page($inventory_management_helper);
} else if(isset($_GET['page']) && $_GET['page'] == 'register') {

} else if(isset($_GET['page']) && $_GET['page'] == 'homepage') {

}

function income_cost_management_login_page($helper_object){
  $helper_object->income_cost_management_create_login_page();
}
