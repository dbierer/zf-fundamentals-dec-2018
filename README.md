# Zend Framework Fundamentals December 2018

## NOTE TO SELF
* come up with a more clear example of `escapeHtmlAttr()`
* resolve conflicts re: zend-json and report back to the class how you did it

## Homework
* For Fri 7 December 2018
  * Lab: Create a New Module
  * Lab: Create a New Controller
  * Lab: Create a View Template
* For Mon 10 December 2018
  * Lab: Using a Built-in Controller Plugin
  * Lab: Using a Custom Controller Plugin
  * Lab: New Controllers and Factories
    * Don't forget to add a route to the ViewController!!!
* For Wed 12 December 2018
  * Lab: Creating and Accessing a Service
* For Fri 14 December 2018
  * Lab: Manipulating Views and Layouts

## ZF2 vs ZF3
* https://github.com/dbierer/ZF2_ZF3_Side_by_SIde

## ERRATA
* file:///D:/Repos/ZF-Level-1/Course_Materials/index.html#/3/8 s/be ZF Advanced Class (confirm?)
* RoutMatch
* file:///D:/Repos/ZF-Level-1/Course_Materials/index.html#/4/15: not a public function: it's an option of $this->redirect()->
* file:///D:/Repos/ZF-Level-1/Course_Materials/index.html#/4/25: response->setBody() no longer available ... what is the alternative, and what happened???
* file:///D:/Repos/ZF-Level-1/Course_Materials/index.html#/4/33: add mention that you also need to define a route to the ViewController
* file:///D:/Repos/ZF-Level-1/Course_Materials/index.html#/5/24: file s/be `/config/autoload/db.local.php`
* file:///D:/Repos/ZF-Level-1/Course_Materials/index.html#/6/9:  the "View" unit is out of order: s/be first!
* file:///D:/Repos/ZF-Level-1/Course_Materials/index.html#/5/30: the step should refer to `IndexControllerFactory`
* file:///D:/Repos/ZF-Level-1/Course_Materials/index.html#/5/31: need to review constructor for ViewModel in IndexController::indexAction() as follows:
```
// either to this:
// in /config/autoload/global.php
return [
    'service_manager' => [
        'services' => [
            'categories' => [
                'categories' => [
				'barter',
    // etc.
// OR do this in Market\Controller\IndexController::indexAction()
    // other code not shown
        return new ViewModel(array_merge($this->dayWeekMonth(),
                             ['categories' => $this->categories]));
```
* file:///D:/Repos/ZF-Level-1/Course_Materials/index.html#/6/5: not clear that `escapeHtmlAttr()` is working properly
* file:///D:/Repos/ZF-Level-1/Course_Materials/index.html#/6/6: need to add namespace for "extends" class
* file:///D:/Repos/ZF-Level-1/Course_Materials/index.html#/6/28: should also mention how to activate alternate view strategies
* file:///D:/Repos/ZF-Level-1/Course_Materials/index.html#/6/31: out of order: belongs w/ discussion of helpers

* Lab: Using a Custom Controller Plugin
  * Remember to add an alias to he new plugin. w/be "the" new plugin

## VM NOTES
* from Richard to All Participants:
    * there is a problem that my VM is taking my resource crazily and running really slowly. Do we need to run VM in the class? Or I can just watch the recording later?
    * The thing is it is gradually slowing, might be something running background.
* from Peter to All Participants:
    * Because I had spare memory and CPU on my host, I changed my setting to use 8GB memory and 2 CPUs
* from Daryl
    * Hi Doug,
        * Okay, the problem originated from one of the big three software (Vagrant, Virtualbox, or Ubuntu 18.04) upgrades, and I didn't catch it in the latest Vagrantfile version. The fix is simple.
        * Have the students vagrant halt the VM, then open the Vagrantfile for edit, and change the this line:
```
vb.customize ["modifyvm", :id, "--accelerate3d", "on"]
```
        * To:
```
vb.customize ["modifyvm", :id, "--accelerate3d", "off"]
```
        * Then vagrant up the VM and it will be fine. I'll try to get the student emails and send them a note to this fix, so you don't have to and they are not stuck over the weekend with a dog of a VM. If I cannot do that, you may have to.
        * On another note. I noticed while checking it out, you didn't composer install the vendor directory before having me upload the course-project.tar.bz2.  That means the localhost links bonk and will require the vendor directory installed.

## Q & A
* Q: Where do I find examples of ZF tests?

* Q: What about the "invokables" service key
```
// some module.config.php
'service_manager' => [
    // this designation is the same as the next one
    'invokables' => [
        \Module\Mapper\MyMapper::class => \Module\Mapper\MyMapper::class,
    ],
    // this designations is the same as the previous one
    'factories' => [
        \Module\Mapper\MyMapper::class =>
            \Zend\ServiceManager\Factory\InvokableFactory::class,
    ]
],
// etc.
```
