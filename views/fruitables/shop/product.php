
<div class="row g-4 justify-content-center">
<?php foreach ($listpro as $value) { ?>
                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                   
                                        <div class="rounded position-relative fruite-item">
                                        
                                            <div class="fruite-img">
                                                <img src="img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
                                            </div>

                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;"><a href="index.php?act=productDetail&id=<?php echo $value->product_id; ?>"><?php echo $value->category_name; ?></a></div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                           <a href="index.php?act=productDetail&id=<?php echo $value->product_id; ?>"><h4><?php echo $value->name; ?></h4></a>     
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0"><?php echo number_format($value->price); ?></p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                      
                                    </div>
                                    <?php }?>
 
                                    <div class="col-12">
                                        <div class="pagination d-flex justify-content-center mt-5">
                                            <a href="#" class="rounded">&laquo;</a>
                                            <a href="#" class="active rounded">1</a>
                                            <a href="#" class="rounded">2</a>
                                            <a href="#" class="rounded">3</a>
                                            <a href="#" class="rounded">4</a>
                                            <a href="#" class="rounded">5</a>
                                            <a href="#" class="rounded">6</a>
                                            <a href="#" class="rounded">&raquo;</a>
                                        </div>
                                    </div>
                                    </div>
                                   