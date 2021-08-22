(function () {
    var app = angular.module('webscantest', []);
    var mainCtrl = {
        initCtrl: function ($scope, $http) {

            var controller = this;
            $scope.searchData = {};
            $scope.data = {};


            controller.populateData = function(){
                $http.get('./data/vuln.json').then(function(data) {
                    $scope.vulnData = data.data;
                }, function (error) {
                    console.log(error);
                });
            };

            controller.commentData =  function () {
                $http.get('./data/comments.json').then(function(data) {
                    $scope.commentData = data.data;
                }, function (error) {
                    console.log(error);
                });
            };

            controller.userData = function(){
                $http.get('../data/users.json').then(function(data) {
                    $scope.userList = data.data;
                }, function (error) {
                    console.log(error);
                });
            };

            controller.navigate = function () {
               switch($scope.data.dropdown){
                   case 'home':
                       window.location = window.location;
                       break;
                   case 'about':
                       window.location = './sub/about-' + 'onchange.html';
                       break;
                   case 'contact':
                       window.location = './sub/contact-' + 'onchange.html';
                       break;

               }
            };

            controller.processVulnerability = function () {
                window.location = './sub/addvuln-' + 'click.html';
            };

            controller.navigation = function(pageName){
                switch(pageName){
                    case 'home':
                        window.location = './';
                        break;
                    case 'features':
                        window.location = './sub/features-' + 'keydown.html';
                         break;
                    case 'docs':
                        window.location = './sub/docs-' + 'mousedown.html';
                        break;
                    case 'partners':
                        window.location = './sub/partners-' + 'mouseenter.html';
                        break;
                    case 'users' :
                        window.location = './sub/users-' + 'mousedown.html';
                        break;
                    case 'svg':
                        window.location = './sub/svg-' + 'click.html';    
                  }
            };

            controller.keyDownData = function (event) {
                var params = { key : event.key };
                $http.get('./data/data-change.php', {params : params}).then(function(data) {
                    console.log(data);
                }, function (error) {
                    console.log(error);
                });
            };
            controller.showData = function () {
                var queryDict = {};
                var queryParam = location.search.substr(1).split("&");
                queryDict[queryParam[0].split("=")[0]] = queryParam[0].split("=")[1];
                for(var i in queryDict){
                    if(i === 'id'){
                        var id = queryDict[i];
                        $http.get('./data/vuln.json').then(function(data) {
                            for(var k in data.data){
                                if(data.data[k].id ==  id){
                                   $scope.severity = controller.vulnLevel(data.data[k].severity);
                                   $scope.vulnerabilityName = data.data[k].vulnerabilityName;
                                   $scope.description = data.data[k].description;
                                }
                            }
                        }, function (error) {
                        });

                    }else{
                        break;
                    }
                }
            };

            controller.openVuln = function (id) {
                window.location = './vuln-data-click.html?id=' + id;
            };


            controller.vulnLevel = function (data) {
                switch (data) {
                    case 'high':
                        return 'H';
                        break;
                    case 'medium':
                        return 'M';
                        break;
                    case 'low':
                        return 'L';
                        break;
                }
            };


        }
    };

    app.controller('mainCtrl', mainCtrl.initCtrl);

})();