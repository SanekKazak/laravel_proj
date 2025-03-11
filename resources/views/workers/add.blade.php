<body>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</body>
<div>
    <form actions = "/add_page" method="POST">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="text" class = "field" id="email" name="email">
        </div>
        <div>
            <label for="name">Name:</label>
            <input type="text" class = "field" id="name" name="name">
        </div>
        <div>
            <label for="role_type">Role:</label>
            <select id="role_type" name="role_type">
                <option value="employee">employee</option>
                <option value="admin">admin</option>
                <option value="manager">manager</option>
            </select>
        </div>
        <div>
            <label for="payment_type">Payment:</label>
            <select id="payment_type" name="payment_type">
                    <option value="10000">10000</option>
                    <option value="20000">20000</option>
                    <option value="30000">30000</option>
            </select>
        </div>
        <button type = "submit">add</button>
    </form>
</div>