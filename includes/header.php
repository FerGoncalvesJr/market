<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/vue"></script>

    <title>Vendas!</title>
  </head>
  <body class="bg-light">
    <div class="container" id="app" v-cloak>
        <div class="row">
            <div class="col-md-10"><h3>Vuejs PHP OOP PDO Mysql CRUD (Create, Read, Update and Delete)</h3>
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex d-flex justify-content-between">
                            <div class="lead">PHP PDO VUEJS CRUD</div>
                            <button id="show-btn" @click="showModal('my-modal')" class="btn btn-primary">Add Records</button>
                        </div>
                    </div>
                    
 
                <!-- Add Records Modal -->
                <b-modal ref="my-modal" hide-footer title="Add Records">
                    <form action="" @submit.prevent="onSubmit">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" v-model="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" v-model="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-sm btn-outline-info">Add Records</button>
                        </div>
                    </form>
                    <b-button class="mt-3" variant="outline-danger" block @click="hideModal('my-modal')">Close Me</b-button>
                </b-modal>
                         
                <!-- Update Record Modal -->
                <div>
                    <b-modal ref="my-modal1" hide-footer title="Update Record">
                        <div>
                            <form action="" @submit.prevent="onUpdate">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" v-model="edit_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" v-model="edit_email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-sm btn-outline-info">Update Record</button>
                                </div>
                            </form>
                        </div>
                        <b-button class="mt-3" variant="outline-danger" block @click="hideModal('my-modal1')">Close Me</b-button>
                    </b-modal>
                </div>
            </div>
        </div>
 
    </div>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<!-- BootstrapVue js -->
<script src="https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js"></script>
<!-- Axios -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>


