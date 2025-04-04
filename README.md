## Laravel Packages

During installation I selected the Vue with Inertia Starter Kit. I am usinug Laravel's default authentication system.

## User Registration

Its not clear whether users should be allowed to register themselves or if registration can only be done by an existing administrative user. For now, because Laravel's auth system provides registration I have kept it in. My thinking is that keeping it in cost 0 amount of work whereas removing it cost some amount of work. Not having a clarity on this point I opt for the path with least work. We can add the work if and when required.

## Database Design

The database layout can be found in the root folder as DATABASE.txt. I have taken some 'shortcuts' for now. For instance my use of enums. E.g. in the businesses table I use an enum field for the business types. While this works it does raise an alarm in my mind that this is not extensible, as per the requirements. Adding a new business type later on requires a new migration and deployment. Having a separate table for business types (like I've done for user_roles) means that business types could be added via the GUI and a simple insert into the db.

## Use of ChatGPT

### Database

    I primarily used ChatGPT around the database design. I am more familiar with MySQL than PostgreSQL (my last use of PostgreSQL was June last year on a short contract. The db was already in place so I hardly touched it directly other than a few update migrations).

    I designed the DB in a text editor and then I copied your entire specification into ChatGPT and asked it to check that 1: my design was an accurate representation of your specification and 2: to help my name fields correctly (for instance I had used datetime instead of timestamp).

    I also asked it to help my choose efficient indexes. Full disclosure, the indexes were almost entirely ChatGPT's work (so if they're wrong don't blame me).

### General

    I often paste functions are whole classes into ChatGPT to check if I have done things according to best practice or efficiency etc.

### Faker

    I do use ChatGPT to go from a migration to the best faker functions for model factories

### CSS

    Not my forte... nuff said

### Packages used
    1. In Laravel we used the Vue/Ineria start kit
    2. We also used Sanctum installed with php artisan install:api
    3. In vue we installed axios

## Future Plans

1. User roles.

    I've used a very simply approaching with a few hard coded user roles per the requirements and a comparing array indexes to determine if a user has a particular capability. For future use I would possibly store the roles in the DB and use a package like Spatie Permissions.

2. CSS / Layout

    This would need to be taken care of properly.

3. Axios

    For now I've coded headers etc in the axios calls. This should be put into a boot file.

4. Filtering, pagination and ordering would be implemented

5. Tests would be added (the existing tests are from Laravel, with minor modifications)

6. The API would be set up correctly with Sanctum and tokens etc if we wanted to move the FE to a separate project

7. "Rebalance" Vue  vs Laravel usage. What I mean is that, for instance, at the moment each time you filter businesses for either distributors or suppliers, it calls a Laravel end point. If, for instance, we knew that we would only ever have less than 50 businesses I might get the whole list only once and then apply filtering and pagination directly within Vue

## Running the App
1. Clone the project from Github
2. run composer install
3. run npm run build
4. run php artisan migrate:fresh --seed
    This will seed the products table as well as businesses and business contacts. It will also create three test users:
    a. admin@example.com => password = admin
    b. manager@example.com => password = manager
    c. sales@example.com => password = sales

I have stubbed most things, except for the Businesses (suppliers and distributors) listing page, which is linked to in the side nav.
Per instructions I have used axios within that page to achieve filtering. The initial page load is via and Interia route.

I have also created a form to create a new business.
