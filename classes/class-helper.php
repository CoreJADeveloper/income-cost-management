<?php
class InventoryManagementHelper
{

  /**
  * Create root URL of the project directory
  */
  public function income_cost_management_root_url($base_dir = __INCOMECOST_MANAGEMENT_ROOT_DIR__){
    $protocol = empty($_SERVER['HTTPS']) ? 'http' : 'https';

    $domain = $_SERVER['SERVER_NAME'];

    $doc_root  = $_SERVER["DOCUMENT_ROOT"];

    $base_url = preg_replace("!^${doc_root}!", '', $base_dir);

    $port = $_SERVER['SERVER_PORT'];
    $disp_port = ($protocol == 'http' && $port == 80 || $protocol == 'https' && $port == 443) ? '' : ":$port";

    $url = "${protocol}://${domain}${disp_port}${base_url}";

    return $url;
  }

  /**
  * Include template file for a view
  */
  public function income_cost_management_include_file($filePath, $variables = array())
  {
    $output = NULL;

    if(file_exists($filePath)){
      if(!empty($variables))
        extract($variables);

      ob_start();

      include $filePath;

      $output = ob_get_clean();
    }

    echo $output;
  }

  /**
  * Create user login page
  */
  public function income_cost_management_create_login_page(){
    $root_url = $this->income_cost_management_root_url();

    $data['root_url'] = $root_url;

    $this->income_cost_management_include_file(__INCOMECOST_MANAGEMENT_ROOT_VIEWS__.'/login/header.php', $data);
    $this->income_cost_management_include_file(__INCOMECOST_MANAGEMENT_ROOT_VIEWS__.'/login/content.php', $data);
    $this->income_cost_management_include_file(__INCOMECOST_MANAGEMENT_ROOT_VIEWS__.'/login/footer.php', $data);
  }
}
