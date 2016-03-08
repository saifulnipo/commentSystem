# CommentSystem

## Application Url
Following url works if this application is running on a local web server.

`http://localhost//commentSystem/`


## Application name
Current name of the application is `commentSystem` and the folder name is same as the application name.

It is very **important** to have both the same name. Otherwise application will not run.
  Folder name and application name should be same. Suggested as not need to change this seeting. 

  *Application name* is available under following path
  ```
  commentSystem/resource/config.ini
  ```

## Data base setting
The database setting need to update accordingly in the following path
    ```
    commentSystem/resource/config.ini
    ```

## Data base script
Application DB script available under 
    `commentSystem/dbScript/commentSystem_db.sql`
This script need to run before running the application.
  
## Auto refresh rate
Default application auto page refresh rate is `30: seconds`.
This configuration is also possible to change from application settings.
  ```
    commentSystem/resource/config.ini
  ```

## Used lib in the system
As `jquery` and `twitter bootstap` has became web application development *de facto*, 
so i used this two libs for faster development.
 