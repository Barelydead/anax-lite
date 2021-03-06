<?php
/**
 * Bootstrap the framework.
 */
// Where are all the files? Booth are needed by Anax.
define("ANAX_INSTALL_PATH", realpath(__DIR__ . "/.."));
define("ANAX_APP_PATH", ANAX_INSTALL_PATH);

// Include essentials
require ANAX_INSTALL_PATH . "/config/error_reporting.php";

// Get the autoloader by using composers version.
require ANAX_INSTALL_PATH . "/vendor/autoload.php";

// Add all resources to $app
$app                = new \CJ\App\App();
$app->request       = new \Anax\Request\Request();
$app->url           = new \Anax\Url\Url();
$app->router        = new \Anax\Route\RouterInjectable();
$app->response      = new \Anax\Response\Response();
$app->view          = new \Anax\View\ViewContainer();
$app->navbar        = new \CJ\Navbar\Navbar();
$app->session       = new \CJ\Session\Session();
$app->cookie        = new \CJ\Cookie\Cookie();
$app->db            = new \CJ\Database\Database();
$app->textfilter    = new \CJ\Textformat\Textformat();
$app->shop          = new \CJ\Shop\Shop();

// Make app available to classes
$app->textfilter->setApp($app);
$app->shop->setApp($app);

// Make app available to navbar and configure source
$app->navbar->setApp($app);
$app->navbar->configure("navbar.php");

// Make app available to navbar and configure source
$app->db->setApp($app);
$app->db->configure("db_config.php");

// Inject $app into the view container for use in view files.
$app->view->setApp($app);

// Update view configuration with values from config file.
$app->view->configure("view.php");

// Init the object of the request class.
$app->request->init();

// Init the url-object with default values from the request object.
$app->url->setSiteUrl($app->request->getSiteUrl());
$app->url->setBaseUrl($app->request->getBaseUrl());
$app->url->setStaticSiteUrl($app->request->getSiteUrl());
$app->url->setStaticBaseUrl($app->request->getBaseUrl());
$app->url->setScriptName($app->request->getScriptName());

// Update url configuration with values from config file.
$app->url->configure("url.php");
$app->url->setDefaultsFromConfiguration();

// Assets
$app->style = $app->url->asset("style/style.css");
$app->image = $app->url->asset("image/");

// Start session
$app->session->start();

// Load the routes
require ANAX_INSTALL_PATH . "/config/route.php";

// Leave to router to match incoming request to routes
$app->router->handle($app->request->getRoute());
