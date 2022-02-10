<div>
    <form action="update" method="POST">
    @csrf
        <input type="text" name="dealer_name"><br><br>
        <input type="text" name="dealer_type"><br><br>    
        <input type="text" name="email"><br><br>  
        <button type="submit"> update </button>
    </form>
</div>