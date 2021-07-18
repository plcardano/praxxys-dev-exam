<template>
    <div>
        <h1>Create Product</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name" style="color: red">Required fields: *</label>
                    <br>
                    <label for="name">Product name:*</label>
                    <input type="text" class="form-control" v-model="form.name" required>
                </div>

                <div class="form-group">
                    <label for="category">Category:*</label>
                    <select name="category" class="form-control" v-model="form.category" required>
                        <option disabled selected>choose category</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>    
                </div>  

                <div class="form-group">
                    <label for="description">Description:*</label>
                    <ckeditor v-model="form.description" tag-name="textarea"></ckeditor>
                </div> 

                <div class="form-group">
                    <label for="date">Date:*</label>
                    <input type="datetime-local" name="date" class="form-control" v-model="form.date" required>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" @click="submit">Submit</button>
                </div>
            </div>
            
        </div>
           
    </div>
</template>

<script>

export default {
     data() {
         return {
             form: {
                 name: "",
                 category: "",
                 date: "",
                 description: "",
             }
         }
     },
     methods: {
         submit() {
             axios.post('/products', this.form)
             .then(function (response) {
                 window.location = response.data.redirect;
                 alert('Success')
             })
             .catch(function (error) {
                 alert('Please fill in required fields')
             });
         }
     }
}
</script>
