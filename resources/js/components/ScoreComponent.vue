<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left font-weight-bold">Student Scoreboard</div>
                        <div class="float-right">
                            <div class="form-inline">
                                <div class="form-group mx-sm-3 mb-1">  
                                    <input type="text" v-model="student_id" class="form-control" placeholder="Student ID" @keyup.enter="getSocre" autofocus>
                                </div>
                                <button class="btn btn-primary mb-1" @click="getSocre">Search</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">Student ID: <span class="font-weight-bold">{{ student.student_id }}</span></div>  
                            <div class="col-md-4">Name: <span class="font-weight-bold">{{ student.name }}</span></div>
                            <div class="col-md-4">DOB: <span class="font-weight-bold">{{ student.dob }}</span></div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>#</th>
                                <th>Course</th>
                                <th>Score</th>
                            </tr>                        
                            <tr v-for="score in student.scores" :key="score.id">
                                <td>{{ score.id }}</td>
                                <td>{{ score.course_name }}</td>
                                <td>{{ score.score }}</td>
                            </tr>                        
                        </table>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {    
        data: function () {
            return {
                student_id:'',
                student: [{
                    'student_id':'',
                    'name':'',
                    'dob':'',
                    'scores':[],
                }]
            }
        },
        methods: {
            getSocre(){
                this.student='';
                if(this.student_id.trim().length==0){
                    return
                }
                axios.put('/show',{
                    student_id:this.student_id
                }).then((resp) =>{
                    this.student = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Student Id not registered !!");
                })
                this.student_id='';
            }
        }
    }
</script>
