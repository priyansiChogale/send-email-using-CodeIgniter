<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send e-mail</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400;500;600;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Itim&display=swap');
        *{
            margin: 0;
            padding: 0;
            font-family: 'Raleway', sans-serif;
        }

        body{
            background-image: url("https://raw.githubusercontent.com/priyansiChogale/coffeeBlogs/main/images/homeBg.jpg");
            background-size: cover;
            background-attachment: fixed;
        }


        .title{
            color: white;
            text-align: center;
            padding-top: 20px;
            font-size: 18px;
            font-family: 'Itim', cursive;
        }

        .dotted{
            transform: translateY(-20px);
        }

        label{
            margin-top: 15px;
        }

        .sendBtn{
            width: 200px;
            background-color: rgb(255, 134, 175);
            color: #555;
            font-weight: 600;
            margin-top: 20px;
        }

        .content-1{
            background-color:rgba(64,224,208, 0.85 ); 
            margin: 120px auto;
            width: 70%;
            padding-bottom: 30px;
            padding-left: 20px;
            padding-right: 20px;
        }

        .invalid-feedback{
            font-weight: 600;
        }
    </style>

  </head>
  <body>

  <?php $validation = \Config\Services::validation(); ?>

  
  <div class="container content-1" id="contactus">
    <h6 class="title">Send E-mail</h6>
    <h6 class="title dotted">-------------------------------------</h6>
    
    <form action="<?= base_url('send') ?>" method="POST" enctype="multipart/form-data" novalidate>
    
    
    <div class="row justify-content-center">
    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-light col-md-10" role="alert">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>
    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-light col-md-10" role="alert">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>
      <div class="col-md-5">
        <label class="form-label">Name</label>
        <input type="email" class="form-control <?= ($validation->getError('fname'))?'is-invalid':'' ?>" value="<?= set_value('fname') ?>" name="fname" id="fname">
        <?php if($validation->getError('fname')):?>
            <div class="invalid-feedback"><?= $validation->getError('fname')?></div>
        <?php endif; ?>
      </div>
      <div class="col-md-5">
        <label class="form-label">Email</label>
        <input type="email" class="form-control <?= ($validation->getError('email'))?'is-invalid':'' ?>" value="<?= set_value('email') ?>" name="email" id="email">
        <?php if($validation->getError('email')):?>
            <div class="invalid-feedback"><?= $validation->getError('email')?></div>
        <?php endif; ?>
      </div>
      <div class="col-md-10">
        <label class="form-label">Subject</label>
        <input type="text" class="form-control <?= ($validation->getError('subject'))?'is-invalid':'' ?>" value="<?= set_value('subject') ?>" name="subject" id="subject">
        <?php if($validation->getError('subject')):?>
            <div class="invalid-feedback"><?= $validation->getError('subject')?></div>
        <?php endif; ?>
      </div>
      <div class="col-md-10">
        <label class="form-label">Message</label>
        <textarea class="form-control <?= ($validation->getError('message'))?'is-invalid':'' ?>" value="<?= set_value('message') ?>" name="message" id="message" rows="3"></textarea>
        <?php if($validation->getError('message')):?>
            <div class="invalid-feedback"><?= $validation->getError('message')?></div>
        <?php endif; ?>
      </div>
      
      <button type="submit" class="btn sendBtn">Send</button>
    
    </div>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
  </body>
</html>