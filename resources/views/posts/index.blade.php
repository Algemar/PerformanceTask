<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Role and Permission Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
      
        body, h1, h2, p, form {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

      
        body {
            background-color: #f4f4f9;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        h2 {
            color: #555;
            margin-top: 20px;
        }

    
        .form-container {
            max-width: 500px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container input {
            width: 100%;
            padding: 12px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-container button {
            width: 100%;
            padding: 12px;
            background-color: #5c6bc0;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #3f51b5;
        }

        
        .display-section {
            margin-top: 40px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .display-section h1 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #333;
        }

        .display-section p {
            margin-left: 20px;
            font-size: 16px;
            color: #555;
        }

        .display-section .role-permission {
            margin-bottom: 20px;
        }

      
        @media (max-width: 600px) {
            .form-container {
                padding: 15px;
            }

            .form-container button {
                padding: 10px;
            }
        }
    </style>
</head>
<body>

    <h1>Role and Permission Management</h1>

   
    <div class="form-container">
        <h2>Create Role</h2>
        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Enter Role Name" required>
            <input type="text" name="guard_name" placeholder="Enter Guard Name" value="web" required>
            <button type="submit">Submit</button>
        </form>
    </div>

   
    <div class="form-container">
        <h2>Create Permission</h2>
        <form action="{{ route('permissions.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Enter Permission Name" required>
            <input type="text" name="guard_name" placeholder="Enter Guard Name" value="web" required>
            <button type="submit">Submit</button>
        </form>
    </div>

    
    <div class="form-container">
        <h2>Assign Permission to Role</h2>
        <form action="{{ route('permissions.assign') }}" method="POST">
            @csrf
            <input type="text" name="user_id" placeholder="Enter User ID" required>
            <input type="text" name="permission" placeholder="Enter Permission Name" required>
            <button type="submit">Submit</button>
        </form>
    </div>

    <!-- Display Roles and Their Permissions -->
    <div class="display-section">
        @if(isset($role) && $role->count())
            @foreach ($role as $roles)
                <div class="role-permission">
                    <h1>{{ $roles->name }}</h1>
                    @if(isset($roles->permissions) && $roles->permissions->count())
                        @foreach ($roles->permissions as $permission)
                            <p>- {{ $permission->name }}</p>
                        @endforeach
                    @else
                        <p>No permissions assigned</p>
                    @endif
                </div>
            @endforeach
        @else
            <p>No roles found</p>
        @endif
    </div>

    <!-- Display Permissions and Their Assigned Roles -->
    <div class="display-section">
        @if(isset($permission) && $permission->count())
            @foreach ($permission as $permissions)
                <div class="role-permission">
                    <h1>{{ $permissions->name }}</h1>
                    @if(isset($permissions->roles) && $permissions->roles->count())
                        @foreach ($permissions->roles as $role)
                            <p>- {{ $role->name }}</p>
                        @endforeach
                    @else
                        <p>No roles assigned</p>
                    @endif
                </div>
            @endforeach
        @else
            <p>No permissions found</p>
        @endif
    </div>

</body>
</html>
