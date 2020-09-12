# todo-symfony

a test project made by PHP symfony framework at backend and a simple frontend with VueJS and Bootstrap.

i have used session as DB, when applicationi starts, init request is called and all task lists and developers inserted to session. you can reach list of them by using related services.

after initialization, calculate request is called and all assignments are realized. you can reach all assignments with assignment request.

Application is now ready for creating new developers and new datasources (APIs) with required infos and DTOs. Just required endpoints should be created for them. Services and Creators are ready.


### Documentation For Some Classes

#### TaskDataSourceDto

|  variable 	|   comment	|
|---	|---	|
|   url	|   url of API service	|
|   pathName	|   name of Path to reach detailed properties 	|
|   difficultyFieldName	|   difficulty field name |
|   timeFieldName	|   estimated time field name |
|   nameFieldName	|   task name |
|   idFieldName	|   id field name |
|   pathIncrement	|   (true/false) if there is increment at the end of path name |  



 <br>

### Rest Endpoints 

        @Route("/rest/data/init", name="init_data")
        @Route("/rest/data/developers", name="list_developers")
        @Route("/rest/data/datasources", name="list_datasources")
        @Route("/rest/assignments/calculate", name="calculate_assignments")
        @Route("/rest/assignments", name="list_assignments")
        @Route("/rest/assignments/estimated-time", name="estimated_time")


### Demo
        http://todo-symfony.herokuapp.com/todo.html