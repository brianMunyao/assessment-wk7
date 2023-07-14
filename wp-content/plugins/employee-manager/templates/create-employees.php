<div class="container">

    <h1>Create An Employee</h1>

    <form action="" method="post">
        <div class="input-con">
            <label for="e_name">Employee Name</label>
            <input type="text" name="e_name" id="e_name" class='full' required>
        </div>
        <div class="input-con">
            <label for="e_email">Employee Email</label>
            <input type="email" name="e_email" id="e_email" class='full' required>
        </div>
        <div class="input-con radio-btn-con">
            <label for="e_name">Employee Gender</label>

            <div>
                <input type="radio" name="e_gender" id="male" value="Male" required>
                <label for="male">Male</label>
            </div>
            <div>
                <input type="radio" name="e_gender" id="female" value="Female" required>
                <label for="female">Female</label>
            </div>
        </div>
        <button type="submit" name="create_employee">SUBMIT</button>
    </form>

</div>

<style>
    .container * {
        font-size: 16px;
    }

    .container h1 {
        font-size: 30px;
        padding: 10px 0;
    }

    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .input-con {
        display: flex;
        flex-direction: column;
        gap: 5px;
        margin: 8px 0;
        width: 300px;
    }

    .input-con input.full {
        width: 100%;
    }

    .radio-btn-con>div {
        display: flex;
        align-items: center;
        gap: 4px;
        margin: 5px 0;

    }

    button {
        margin-top: 10px;
        background: teal;
        color: #fff;
        width: 100%;
        padding: 10px 0;
        border-radius: 5px;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background: #055658;
    }
</style>