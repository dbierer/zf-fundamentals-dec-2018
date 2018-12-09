# Zend Framework Fundamentals December 2018

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

## ZF2 vs ZF3
* https://github.com/dbierer/ZF2_ZF3_Side_by_SIde

## ERRATA
* file:///D:/Repos/ZF-Level-1/Course_Materials/index.html#/3/8 s/be ZF Advanced Class (confirm?)
* RoutMatch
* file:///D:/Repos/ZF-Level-1/Course_Materials/index.html#/4/15: not a public function: it's an option of $this->redirect()->
* file:///D:/Repos/ZF-Level-1/Course_Materials/index.html#/4/25: response->setBody() no longer available ... what is the alternative, and what happened???
* file:///D:/Repos/ZF-Level-1/Course_Materials/index.html#/4/33: add mention that you also need to define a route to the ViewController
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
