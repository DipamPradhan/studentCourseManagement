//buttons
const enrollment = document.getElementById("enrollment");
const addCourse = document.getElementById("addCourse");
const addStudent = document.getElementById("addStudent");
const viewCourses = document.getElementById("viewCourses");
const viewStudents = document.getElementById("viewStudents");
const viewEnrollments  = document.getElementById("viewEnrollments");

//divs
const functionContainer = document.getElementById("functionContainer");
const enrollmentDiv = document.getElementById("enrollmentDiv");
const addCourseDiv = document.getElementById("addCourseDiv");
const addStudentDiv = document.getElementById("addStudentDiv");
const viewCoursesDiv = document.getElementById("viewCoursesDiv");
const viewStudentsDiv = document.getElementById("viewStudentsDiv");
const viewEnrollmentsDiv  = document.getElementById("viewEnrollmentsDiv");
const unclicked = document.getElementById("unclicked");

enrollment.addEventListener("click", function () {
    unclicked.style.display = "none";
    functionContainer.style.display = "block";
    enrollmentDiv.style.display = "block";
    addCourseDiv.style.display = "none";
    addStudentDiv.style.display = "none";
    viewCoursesDiv.style.display = "none";
    viewStudentsDiv.style.display = "none";
    viewEnrollmentsDiv.style.display = "none";
});

addCourse.addEventListener("click", function () {
    unclicked.style.display = "none";
    functionContainer.style.display = "block";
    addCourseDiv.style.display = "block";

    enrollmentDiv.style.display = "none";
    addStudentDiv.style.display = "none";
    viewCoursesDiv.style.display = "none";
    viewStudentsDiv.style.display = "none";
    viewEnrollmentsDiv.style.display = "none";
});

addStudent.addEventListener("click", function () {
    unclicked.style.display = "none";
    functionContainer.style.display = "block";
    addStudentDiv.style.display = "block";

    addCourseDiv.style.display = "none";
    enrollmentDiv.style.display = "none";
    viewCoursesDiv.style.display = "none";
    viewStudentsDiv.style.display = "none";
    viewEnrollmentsDiv.style.display = "none";
});

viewCourses.addEventListener("click", function () {
    unclicked.style.display = "none";
    functionContainer.style.display = "block";
    viewCoursesDiv.style.display = "block";
    
    addCourseDiv.style.display = "none";
    addStudentDiv.style.display = "none";
    enrollmentDiv.style.display = "none";
    viewStudentsDiv.style.display = "none";
    viewEnrollmentsDiv.style.display = "none";
});

viewStudents.addEventListener("click", function () {
    unclicked.style.display = "none";
    functionContainer.style.display = "block";
    viewStudentsDiv.style.display = "block";
    
    addCourseDiv.style.display = "none";
    addStudentDiv.style.display = "none";
    viewCoursesDiv.style.display = "none";
    enrollmentDiv.style.display = "none";
    viewEnrollmentsDiv.style.display = "none";
});

viewEnrollments.addEventListener("click", function () {
    unclicked.style.display = "none";
    functionContainer.style.display = "block";
    viewEnrollmentsDiv.style.display = "block";
    enrollmentDiv.style.display = "none";
    addCourseDiv.style.display = "none";
    addStudentDiv.style.display = "none";
    viewCoursesDiv.style.display = "none";
    viewStudentsDiv.style.display = "none";
});
