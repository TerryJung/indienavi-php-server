#IndieNavi SERVER

##Account Response

###Register

####Parameter
```
http://chilx2.cafe24.com/apps/server/indie/signup.php
[POST]
id, password, email
```

####Code - Message
- 200 - OK

####Error Code - Message
- 501 - ID is overlapped
- 502 - Email is overlapped


###Login
####Parameter
```
http://chilx2.cafe24.com/apps/server/indie/signin.php

[POST]
id, password
```

####Code - Message
- 200 - OK

####Error Code - Message
- 501 - Account is not exist
- 502 - Password is not correct