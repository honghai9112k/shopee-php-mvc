<?php
$allBoookCategory = [];
$allBoookCategory = $data["BookCategory"];
$allPublisher = [];
$allPublisher = $data["Publisher"];
$allAuthor = [];
$allAuthor = $data["Author"];

?>
<div class="cart" style="font-size: 12px !important; color:black;">
    <form role="form" method="POST" id="addBookForm" action="./AddProduct" enctype="multipart/form-data">
        <div class="mb-4 input-group-lg">
            <label for="title" class="form-label">Tên sản phẩm(Sách): </label>
            <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title">
        </div>
        <div class="mb-4 input-group-lg">
            <label for="isbn" class="form-label">Mã ISBN: </label>
            <input type="text" class="form-control" id="isbn" name="isbn">
        </div>
        <div class="mb-4 input-group-lg">
            <label for="authorId" class="form-label">Tác giả: </label>
            <select id="authorId" name="authorId" class="custom-select my-1 mr-sm-2 py-1" aria-label=".form-select-sm example" style="height: 38px;">
                <option selected value="">Tác Giả</option>
                <?php
                foreach ($allAuthor as $key => $value) { ?>
                    <option value="<?php echo $value['Id_author'] ?>">
                        <?php echo $value['Name'] ?>
                    </option>
                <?php }
                ?>
            </select>
        </div>
        <div class="mb-4 input-group-lg">
            <label for="publicationDate" class="form-label">Ngày ra mắt: </label>
            <input type="date" class="form-control" id="publicationDate" name="publicationDate">
        </div>
        <div class="mb-4 input-group-lg">
            <label for="numberOfPage" class="form-label">Số trang: </label>
            <input type="text" class="form-control" id="numberOfPage" name="numberOfPage">
        </div>
        <div class="mb-4 input-group-lg">
            <label for="language" class="form-label">Ngôn ngữ: </label>
            <input type="text" class="form-control" id="language" name="language">
        </div>
        <div class="mb-4 input-group-lg">
            <label for="soldNumber" class="form-label">Số lượng đã bán: </label>
            <input type="text" class="form-control" id="soldNumber" name="soldNumber">
        </div>
        <div class="form-floating mb-4 input-group-lg">
            <label for="summary">Tóm tắt tác phẩm: </label>
            <textarea class="form-control" placeholder="Nội dung chính" id="summary" style="height: 100px" name="summary"></textarea>
        </div>
        <div class="mb-4 input-group-lg">
            <label for="bookCategoryId" class="form-label">Thể loại sách: </label>
            <select id="bookCategoryId" name="bookCategoryId" class="custom-select my-1 mr-sm-2 py-1" aria-label=".form-select-sm example" style="height: 38px;">
                <option selected value="">
                    <--Chọn thể loại sách-->
                </option>
                <?php
                foreach ($allBoookCategory as $key => $value) { ?>
                    <option value="<?php echo $value['Id_category'] ?>">
                        <?php echo $value['Name'] ?>
                    </option>
                <?php }
                ?>
            </select>
        </div>
        <div class="mb-4 input-group-lg">
            <label for="publisherId" class="form-label">Nhà xuất bản: </label>
            <select id="publisherId" name="publisherId" class="custom-select my-1 mr-sm-2 py-1" aria-label=".form-select-sm example" style="height: 38px;">
                <option selected value="">
                    <--Chọn nhà xuất bản-->
                </option>
                <?php
                foreach ($allPublisher as $key => $value) { ?>
                    <option value="<?php echo $value['Id_publisher'] ?>">
                        <?php echo $value['Name'] ?>
                    </option>
                <?php }
                ?>
            </select>
        </div>
        <div class="mb-4 input-group-lg">
            <label for="price" class="form-label">Giá sản phẩm: </label>
            <input type="test" class="form-control" id="price" name="price">
        </div>
        <div class="mb-4 input-group-lg">
            <label for="barcode" class="form-label">Barcode: </label>
            <input type="text" class="form-control" id="barcode" name="barcode">
        </div>
        <div class="mb-4 input-group-lg">
            <label for="discount" class="form-label">Discount: </label>
            <input type="test" class="form-control" id="discount" name="discount">
        </div>
        <div class="mb-4 input-group-lg">
            <label for="image" class="form-label">Ảnh sản phẩm: </label>
            <input type="file" class="form-control" id="image" name="image" style="height: 36px;">
        </div>
        <div class="form-floating mb-4 input-group-lg">
            <label for="description">Description: </label>
            <textarea class="form-control" placeholder="Description" id="description" style="height: 100px" name="description"></textarea>
        </div>
        <div class="form-floating input-group-lg" style="text-align: center;">
            <button type="submit" class="btn btn--primary btn-lg" name="addProduct" id="addProduct" style="padding: 20px;min-width: 230px;">Submit</button>
        </div>
    </form>
</div>