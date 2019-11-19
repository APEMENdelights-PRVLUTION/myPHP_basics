PHP $_REQUEST
PHP $_REQUEST is a PHP super global variable which is used to collect data after submitting an HTML form.

The example below shows a form with an input field and a submit button. When a user submits the data by clicking 
on "Submit", the form data is sent to the file specified in the action attribute of the <form> tag. 
In this example, we point to this file itself for processing form data. If you wish to use another 
PHP file to process form data, replace 
that with the filename of your choice. Then, we can use the super global variable $_REQUEST to collect 
the value of the input field