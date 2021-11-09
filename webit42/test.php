<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container mx=auto mt-3">
    <form action="add_script.php" method="POST">
        <div class="mb-3">
            <label for="" class="form-label">รหัสวิชา</label>
            <input type="text" class="form-control" name="id" placeholder="sub_id">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">ชื่อวิชา</label>
            <input type="text" class="form-control"  name="name" placeholder="sub_name">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">ชั่วโมงปฏิบัติ</label>
            <input type="text" class="form-control"  name="t" placeholder="t_hour">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">ชั่วโมงทฤษฎี</label>
            <input type="text" class="form-control"  name="p" placeholder="p_hour">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">หน่วยดิต</label>
            <input type="text" class="form-control"  name="c" placeholder="credit">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">ครูผู้สอน</label>
            <input type="text" class="form-control"  name="teacher" placeholder="teacher">
        </div>
        <div class="mb-3">
            <label for="" class="form-label"></label>
            <input type="submit" class="btn btn-primary" name="submit" placeholder="submit" value="เพิ่มข้อมูล">
        </div>
    </form>
    </div>
</body>
</html>