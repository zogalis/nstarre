<?PHP
require_once("./include/fgcontactform.php");
$formproc = new FGContactForm();
//1. Add your email address here.
//You can add more than one recipients.
$formproc->AddRecipient('kim.zogalis@gmail.com'); //<<---Put your
//email address here
//2. For better security. Get a random string from
// this link: http://tinyurl.com/randstr
// and put it here
$formproc->SetFormRandomKey('gkEFthfv6gvGAuL');
if(isset($_POST['submitted']))
{
if($formproc->ProcessForm())
{
$formproc->RedirectToURL("thank-you.html");
}
}
?>