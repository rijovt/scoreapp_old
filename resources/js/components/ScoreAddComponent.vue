<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left font-weight-bold"></div>
                        <div class="float-right">
                            <div class="form-inline">
                                <div class="form-group mx-sm-3 mb-1">  
                                    <input type="text" v-model="student_id" class="form-control" placeholder="Student ID" @keyup.enter="getScore" autofocus>
                                </div>
                                <button class="btn btn-primary mb-1" @click="getScore">Search</button>
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
                    <p v-if="errors.length">
                        <b>Please correct the following error(s):</b>
                        <ul>
                        <li v-for="error in errors" :key="error.id">{{ error }}</li>
                        </ul>
                    </p>
                    <div class="row mx-md-n1 p-1">
                        <div class="col flex_right"><h4>Add Scores</h4></div>
                        <div class="col">
                            <select v-model="newScoreCourse" class="form-control" aria-placeholder="sfd">
                                    <option value="">--Select Course--</option>
                                    <option v-for="course in courses" :key="course.id" :value="course.id">{{ course.course_name }}</option>
                            </select>
                        </div>
                        <div class="col"><input type="text" v-model="newScore" class="form-control" placeholder="score" @keyup.enter="addTodo"></div>
                        <div class="col"><button class="btn btn-primary mb-1" @click="addSocre">Add</button></div>
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
                errors: [],
                student: [{
                    'stud_id':'',
                    'student_id':'',
                    'name':'',
                    'dob':'',
                    'scores':[],
                }],
                newScore:'',
                newScoreCourse:'',
                'courses':[{
                    'id':'',
                    'course_name':'',
                }],
            }
        },
        methods: {
            getScore(){
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
            },
            addSocre: function (e) {
                this.errors = [];

                if (!this.student_id) {
                    this.errors.push('Please search student id first !!');
                }
                if (!this.newScoreCourse) {
                    this.errors.push('Please select course !!');
                }
                if (!this.newScore || this.newScore>10 || this.newScore<0) {
                    this.errors.push('Please enter score between 0 to 10 !!');
                }
                if(this.errors.length){
                    e.preventDefault();
                }
                
                axios.post('/store_score',{
                    stud_id:this.student.stud_id,
                    course_id:this.newScoreCourse,
                    score:this.newScore,
                }).then((response) =>{
                    this.getScore()
                })               
            }            
        },
        mounted() {
            axios.get('/courses').then((resp) =>{
                this.courses = resp.data;
            })
        }
    }
</script>
