The idea of this repository is to create a versatile class/object which could perform some validation on data we get back from a form. We would typically do this by using the the post method in PHP although the object could take in any correctly formatted associative array.

The class file defines a class and the main html file instantiates an object based on this class. The constructor passes in the associative array which contains the keys and values and validates the inputs based. The only two functions that are public are the constructor and the main validation function, which runs the private functions for each field.

To use the object, we must adjust the name of our input field to match the object. This is because the name field on a form defines the key of the associative array, and our function relies on the key to identify which values to validate with which function.  

The fun part of this object is the fact that it can be used on forms which include all or just some fields. For example, if
we have a form which calls for a user name and password but not an email, the object will recognise that the form isn't using the email
field and will ignore that validation. 

It does this by simply searching for the appropriate key in the post data and if it isn't there, it doesn't run that private function. Whenever we post data in PHP, the key for the field is produced, even if the valued for the field is empty. This means that we can guarantee that the keys represent the input fields. 

This does put the emphasis on the user to check that their input field names match that of the object, otherwise the function will not
run and they may mistakenly think that it has. For example, if I call my input 'username', the validation will miss this because it was looking for the field of 'user'.

The return value for the object is an associative array of errors and error text. We can check if a form is valid by checking if the
error field is null. Again,caution in testing is advised because the error field will be null both when there are no errors and when the
whole thing is broken. 

I haven't done any sanitising of the data with this object because this is probably best done when the data goes into a database - the
goal of this object is just to check if the user is being silly.

The next question would be what to do with this error data once we have it. There are various ways of displaying it, however, if you are
into bells and whilstles it might just be best to run identitcal Javascript validation along side it, based on a key down event 
listener. This will give the user real time feedback about their errors rather than waiting until they submit the data. In terms of user
experience, this correction tends to be a bit gentler and less frustrating.

So why have this object at all then Matt? Firstly, if you aren't a dab hand at Javascript you can use the php errors from the array and 
echo them out to show the errors. I have done this rather crudely on the page, so you can see the functionality without having to plug 
it into your own project first.

Second, and more importantly, one shouldn't trust Javascript to validate a form for you as people can turn Javascript off - php is the
guardian of database integrity, not its prettier, flittier cousin, Javascript. By doing the null test I mentioned above, you can make sure the data is error free before passing it into a data base.

It is also easy enough to add any and every validation under the sun to the project, simply by creating a new function and adding the if statement to check if its input is included in the associative array being passed in.

These are the fieldsand corresponding tests I have at the moment, although I might add more as I go along. 

Fields and filters

user:           Must be between 4 and 10 characters 
email:          Standard php email filter
pwd:            At least one number, one capital letter and one lower case letter
confirm-pwd:    Must match pwd field

