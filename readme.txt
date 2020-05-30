Read Me

The idea of this exercise was to create a versatile class/object which could perform some filters on data we get back from a form. 
The input for the Object is an associative array where the keys represent the fields such as 'user', 'email' and 'pwd'. Providing
the user adjusts the name of their input field names to match the object, this will produce the appropriate associative array for the object 
when using the post method.

The fun part of this object is the fact that it can be used on forms which include all fields or just some fields. For example, if
we have a form which calls for a user name and password but not an email, the object will recognise that the form isn't using the email
field and will ignore that validation. 

It does this by simply searching for the appropriate key in the post data and if it isn't there, it doesn't run that private function. This works
even if the input exists on the form but the user hasn't filled it in because the post method produced the key, whether the user has filled the field 
in or not. 

This does put the emphasis on the user to check that their input fields match that of the object, otherwise the function will not run and 
they may mistakenly think that it has. For example, if I use this object and use an input field with a name of 'username', the object won't run 
validation on this field because it was looking for a field called 'user'.

The return value for the object is an associative array of errors and error text. One can check if a form is valid by checking if the error field is null.
Again,caution in testing is advised because the error field will be null both when there are no errors and when the whole thing is broken. 

I haven't done any sanitising of the data with this object because this is probably best done when the data goes into a database - the goal of this object 
is just to check if the user is being silly.

The next question would be what to do with this error data once we have it. There are various ways of displaying it, however, if you are into bells and whilstles
it might just be best to run identitcal Javascript validation along side it, based on a key down event listener. This will give the user real time feedback about
their errors rather than waiting until they submit the data.In terms of user experience, this correction tends to be a bit more gentle and less frustrating.

So why have this object at all then Matt? Firstly, if you aren't a dab hand at Javascript you can use the php errors from the array and echo them out to show the errors.
Second, and more importantly, one shouldn't trust Javascript to validate a form for you as people can turn Javascript off - php is the guardian of database integrity, not 
its prettier, flittier cousin, Javascript. By doing the null test I mentioned above, you can see if the data is error free.

Fields and filters

user:           Must be between 4 and 10 characters 
email:          Standard php email filter
pwd:            At least one number, one capital letter and one lower case letter
confirm-pwd:    Must match pwd field

