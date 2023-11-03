### Coding Challenge Guidelines and Recommendations

1. Demonstrate production-level architectural design and code quality.
2. Demonstrate your knowledge of PHP and Laravel.
3. Show us you understand git by making logical, incremental check-ins.
4. Document your solution.


## Brief

The web application that needs to be developed will be a basic URL-shortening service. It will have a basic form that consists of 1 text input field and 1 submit button. The text input field will be used for “destination URL” which will basically be the long URL that will be shortened. Below the input field, there should be a simple table showing the latest created URLs on the system.

The form should be only accessible by logged-in users, meaning the application would need to have some sort of basic authentication for login and registration (there’s no need to do this from scratch).

## Requirements

1. Create a *Url* model with the following properties:
   
   1. Id
   
   2. destination (string): it will contain the long URL.
   
   3. slug (string): it will contain the slug of the shortened URL.
   
   4. views: it will contain the times the link has been opened
   
   5. Timestamps (created at, updated at)

2. Add a model accessor to the model above to retrieve the full shortened URL as an attribute and make sure this attribute is appended to the model whenever it is retrieved.

3. Create a migration for the model above.

4. Implement an auth system for login and registration.

5. Create a form that will only be accessible to registered and logged-in users.

6. Create an input text field for the “destination” or long-URL and a submit button.

7. Add validations to the form so it will not allow the text field to be “empty” and only allow valid URLs.

8. The form once is valid and submitted, it should store the destination URL in the DB using the Url model. It is also required to generate a 5-character long random string that will be used as the “slug” property.

9. Create the routes needed and make use of model binding for them when applicable (for the Url model).

10. Make sure that the route that will redirect the shortened URL to the actual long-URL is created and that the view count for that URL is increased by one each time it’s visited.

11. The use of Laravel helpers/facades is encouraged.

12. Add feature/unit tests as you see fit.

13. Create a scheduled task that deletes links that were not visited for the past 30 days.

14. Update this [README.md](http://README.md "http://README.md") file,  documenting your application (the more detailed the better)

15. Create a simple POST REST API endpoint that takes “destination” as a required property of the request body. If no “destination” is provided then it should return a validation error. The same is applied when a non-valid URL is provided. Sample of valid payload for the endpoint:

`{` `"destination": "https://google.com"`

`}`

Expected JSON response on success:

`{` `"destination": "https://google.com",` `"slug": "k9GZw",` `"updated_at": "2021-09-10T23:52:11.000000Z",` `"created_at": "2021-09-10T23:52:11.000000Z",` `"id": 18,` `"shortened_url": "http://url-shortener.test/k9GZw"`

`}`

## Important to consider

1. Make sure to use a git repository (either bitbucket or GitHub) to store the code of your application. Then share the URL of the repository with us. Make sure the repository is public.

2. Feel free to add any additional “feature” that you may think it’s worth adding (feel free to show off here; extra points for creativity)

3. Please follow the best coding practices/principles, standard naming conventions, etc

4. Add code comments where possible so we can understand your thinking behind the code logic

## Completion Time

This task should take 2-4 days to complete.
