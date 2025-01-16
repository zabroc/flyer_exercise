# Exercise

## Preparation

1. Start symfony server like symfony server:start
2. composer install 
3. php bin/console doctrine:migrations:migrate
4. Look at http://localhost:8000/flyer/edit/1, make sure there is a  form to save flyer meta data.
5. The form should be able to update flyer data.

## Exercise

1. There is second entity region. Regions can be applied to flyers. 
   2. Please allow the form to attach regions to flyers. 
   3. Commit your solution.
2. Now try to replace the symfony 'region' form field with a javascript form, you can use vanilla js or any other framework. The js form needs 
   1. to render region options in the frontend.
   2. needs to send off checked regions to the backend and persist accordingly. Try to offload as many logic as possible to the form builder.
   3. Commit your solution.





 