
// MODULE definition
var app = angular.module("myApp", []);



//Controller pour poster une nouvelle chaussure et afficher la liste
app.controller("addShoesCrtl",function ($scope,$http){

    $scope.udpateList= function(){

         // function ajax angularJs pour récupérer la liste des chaussures
        $http.get("getShoesList.php").then(function(response) {
        
            $scope.myData =response.data.liste;
            
            
        });
    
    };

    $scope.postdata = function (nom,prix,description,image) {

        var data = {nom:nom,image:image,description: description,prix: prix};

       // function ajax angularJs pour poster une nouvelle chaussure

        $http.post('addShoes.php', JSON.stringify(data));
        $scope.udpateList();

    };

   
    $scope.udpateList();
});