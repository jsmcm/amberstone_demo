## Laravel Packages

During installation I selected the Vue with Inertia Starter Kit. I am usinug Laravel's default authentication system.

## User Registration

Its not clear whether users should be allowed to register themselves or if registration can only be done by an existing administrative user. For now, because Laravel's auth system provides registration I have kept it in. My thinking is that keeping it in cost 0 amount of work whereas removing it cost some amount of work. Not having a clarity on this point I opt for the path with least work. We can add the work if and when required.

## Database Design

The database layout can be found in the root folder as DATABASE.txt. I have taken some 'shortcuts' for now. For instance my use of enums. E.g. in the businesses table I use an enum field for the business types. While this works it does raise an alarm in my mind that this is not extensible, as per the requirements. Adding a new business type later on requires a new migration and deployment. Having a separate table for business types (like I've done for user_roles) means that business types could be added via the GUI and a simple insert into the db.

## Use of ChatGPT

I primarily used ChatGPT around the database design. I am more familiar with MySQL than PostgreSQL (my last use of PostgreSQL was June last year on a short contract. The db was already in place so I hardly touched it directly other than a few update migrations).

I designed the DB in a text editor and then I copied your entire specification into ChatGPT and asked it to check that 1: my design was an accurate representation of your specification and 2: to help my name fields correctly (for instance I had used datetime instead of timestamp).

I also asked it to help my choose efficient indexes. Full disclosure, the indexes were almost entirely ChatGPT's work (so if they're wrong don't blame me).
