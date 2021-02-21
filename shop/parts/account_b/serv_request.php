<div class="col-10  mt-3">
    <div class="card border-info mb-3">
        <div class="card-body">
            <h5 class="card-title text-left ml-2">
                <?php
                if($row['status'] == "Новый") { ?>
                    <p class="card-text"><?php echo $row['title']; ?></p> 
                <?php } else { ?>
                    <a href="/services/product.php?prod_id=<?php echo $row['id']; ?>">
                        <?php echo $row['title']; ?>
                    </a>    
                <?php } ?>
                
            </h5>
            <div class="col-md-4">
                <img style="height: 250px; width: 250px;" src="/services/images/<?php echo $row['image']; ?>" alt='Услуга' class="card-img float-left mr-4">
            </div> 
            <div>
                <p class="card-text"><?php echo $row['description']; ?></p>
                <p class="card-text"><?php echo $row['content']; ?></p>
                <p class="card-text">Адрес: <?php echo $row['town']; ?>, <?php echo $row['street']; ?>, <?php echo $row['house']; ?>/<?php echo $row['flat']; ?></p>
                <p class="card-text">Статус: <?php echo $row['status']; ?></p> 
            </div>
            <?php
            if (isset($_COOKIE["user_id_b"])) { ?>
            <button onclick="deleteServUserB(this, <?php echo $row['id']; ?>)" class="btn btn-warning mt-3">Удалить</button> <?php
            } ?>
        </div>
    </div>  
</div>  