/* global devstudyAPP */
'use strict';
// 41.893549, 12.493280
// 41.893925, 12.493009
devstudyAPP.controller('MonitoringSurpriceController',
function($scope, $http, $interval, $mdDialog) {
    $scope.theTime = 0
    $scope.timeUpdate = 0;
      $interval(function () {
          $scope.theTime = $scope.theTime + 1;
          if(($scope.theTime-$scope.timeUpdate)>3){
              $scope.link = false
          }else{
              $scope.link = true
          }
      }, 100);

    // $scope.ip_address = 'http://172.20.10.6';
    $scope.ip_address = 'http://localhost';
    $scope.linkRover = $scope.ip_address + ':3001';
    $scope.linkStreamRover = $scope.ip_address + ':8081/stream.mjpg';

    $scope.link = false;
    $scope.map_flag = true;

    $scope.stastus = 0;
    $scope.imu_flag = false;
    $scope.viewImu = function() {
        $scope.imu_flag = !$scope.imu_flag;
    }
    $scope.viewMap = function() {
        $scope.map_flag = !$scope.map_flag;
    }
    $scope.distance_flag = false;
    $scope.viewDistance = function() {
        $scope.distance_flag = !$scope.distance_flag;
    }

    $scope.fusion_flag = false;
    $scope.viewFusion = function() {
        $scope.fusion_flag = !$scope.fusion_flag;
    }

  $scope.status = '  ';
  $scope.customFullscreen = true;

  $scope.data_scan_distances = [{x: 0,y: 10}, {x: 5,y: 12}, {x: 10,y: 5}, {x: 15,y: -5},{x: 10,y: -1},{x: 5,y: -1},{x: 0,y: -10},
                                {x: -5,y: -1},{x: -10,y: -1},{x: -15,y: 1},{x: -10,y: 4},{x: -5,y: 10},{x: 0,y: 10}];


    setTimeout(function() {
        $scope.$apply(); //this triggers a $digest
        $scope.colors = ['#45b7cd', '#ff6384', '#ff8e72'];
        $scope.labels = [1, 2, 3, 4, 5, 6, 7, 8 ,9, 10];
        $scope.series = ['Series A', 'Series B'];
        $scope.data_altitude = [[65, 59, 80, 81, 56, 55, 40, 65, 59, 80]];
        $scope.data_distance2 = [[65, 59, 80, 81, 56, 55, 40, 65, 59, 80]];
        $scope.onClick = function (points, evt) {
          console.log(points, evt);
        };
        $scope.datasetOverride = [{ yAxisID: 'y-axis-1' }, { yAxisID: 'y-axis-2' }];
        $scope.optionslol = {
          scales: {
            xAxes: [
                {
                  id: 'x-axis-1',
                  type: 'linear',
                  display: true,
                  ticks: {min: -250, max:250}
                }
              ],
            yAxes: [
              {
                id: 'y-axis-1',
                type: 'linear',
                display: true,
                ticks: {min: -250, max:250}
              }
            ]
          }
        };
        $scope.options = {
          scales: {
            yAxes: [
              {
                id: 'y-axis-1',
                type: 'linear',
                display: true,
                position: 'left',
                ticks: {min: -10, max:50}
              }
            ]
          }
        };
        $scope.options2 = {
          scales: {
            yAxes: [
              {
                id: 'y-axis-1',
                type: 'linear',
                display: true,
                position: 'left',
                ticks: {min: 0, max:400}
              }
            ]
          }
        };
        $scope.optionsCompass1 = {
          scales: {
            yAxes: [
              {
                id: 'y-axis-1',
                type: 'linear',
                display: true,
                position: 'left',
                ticks: {min: -25, max:+25}
              }
            ]
          }
        };
        $scope.optionsCompass2 = {
          scales: {
            yAxes: [
              {
                id: 'y-axis-1',
                type: 'linear',
                display: true,
                position: 'left',
                ticks: {min: -35, max:+35}
              }
            ]
          }
        };
        $scope.optionsCompass3 = {
          scales: {
            yAxes: [
              {
                id: 'y-axis-1',
                type: 'linear',
                display: true,
                position: 'left',
                ticks: {min: -50, max:+50}
              }
            ]
          }
        };
        $scope.optionsFusion = {
          scales: {
            yAxes: [
              {
                id: 'y-axis-1',
                type: 'linear',
                display: true,
                position: 'left',
                ticks: {min: -180, max:+180}
              }
            ]
          }
        };

        $scope.data_accelerometer_x = [[65, 59, 80, 81, 56, 55, 40, 65, 59, 80]];
        $scope.data_accelerometer_y = [[65, 59, 80, 81, 56, 55, 40, 65, 59, 80]];
        $scope.data_accelerometer_z = [[65, 59, 80, 81, 56, 55, 40, 65, 59, 80]];
        $scope.data_gyroscope_x = [[65, 59, 80, 81, 56, 55, 40, 65, 59, 80]];
        $scope.data_gyroscope_y = [[65, 59, 80, 81, 56, 55, 40, 65, 59, 80]];
        $scope.data_gyroscope_z = [[65, 59, 80, 81, 56, 55, 40, 65, 59, 80]];
        $scope.data_compass_x = [[65, 59, 80, 81, 56, 55, 40, 65, 59, 80]];
        $scope.data_compass_y = [[65, 59, 80, 81, 56, 55, 40, 65, 59, 80]];
        $scope.data_compass_z = [[65, 59, 80, 81, 56, 55, 40, 65, 59, 80]];
        $scope.data_fusion_pose_roll = [[65, 59, 80, 81, 56, 55, 40, 65, 59, 80]];
        $scope.data_fusion_pose_pitch = [[65, 59, 80, 81, 56, 55, 40, 65, 59, 80]];
        $scope.data_fusion_pose_yaw = [[65, 59, 80, 81, 56, 55, 40, 65, 59, 80]];

    }, 0);
    $scope.fusionPose = {};
    $scope.mapData = {
        coors: [],
        position:{},
        target:{}
    };
    $scope.timer = 0;

    var socket = io.connect($scope.linkRover);

    socket.on("reconnect_attempt", function(){
        console.log(':(');
        $scope.link = false;
    });
    socket.on("disconnect", function(){
        console.log(':(');
        $scope.link = false;
    });

    $scope.getStyle = function(status){
        // console.log($scope.status);
        if($scope.status == status){
            // console.log(status);
            return {'background-color':'green'};
        } else{
            return {};
        }
    };

    socket.on('news', function (data) {
        $scope.$apply(function(){
            $scope.timeUpdate = $scope.theTime;
            // console.log(data.status);
            if(data.status){
                $scope.status = data.status;
            }
            if(data.gps){
                $scope.mapData.position.lat = data.gps.latitude;
                $scope.mapData.position.lon = data.gps.longitude;

                $scope.voltage = data.voltage.toFixed(6);
            }
            if(data.theta_target){
                $scope.theta_target  = data.theta_target;
            }
            if(data.roll){
                $scope.fusionPose.roll  = data.roll;
                $scope.data_fusion_pose_roll[0].push(data.roll);
                $scope.data_fusion_pose_roll[0].shift();
            }
            if(data.pitch){
                $scope.fusionPose.pitch  = data.pitch;
                $scope.data_fusion_pose_pitch[0].push(data.pitch);
                $scope.data_fusion_pose_pitch[0].shift();
            }
            if(data.theta_bussola){
                $scope.theta_bussola = data.theta_bussola;
                $scope.fusionPose.yaw  = data.theta_bussola;
                $scope.data_fusion_pose_yaw[0].push($scope.fusionPose.yaw);
                $scope.data_fusion_pose_yaw[0].shift();
            }
            if(data.altitude){
                $scope.altitude = data.altitude;
            }
            if(data.latitude){
                $scope.mapData.position.lat = data.latitude;
            }
            if(data.longitude){
                $scope.mapData.position.lon = data.longitude;
            }
            if(data.distance_target){
                $scope.distance_target= data.distance_target;
            }

            if(data.v_left){
                $scope.v_left= data.v_left;
            }
            if(data.v_right){
                $scope.v_right= data.v_right;
            }


            if(data.accel){
                $scope.accelerometer = {
                  ax: data.accel[0],
                  ay: data.accel[1],
                  az: data.accel[2]
                };
                $scope.data_accelerometer_x[0].push($scope.accelerometer.ax);
                $scope.data_accelerometer_x[0].shift();
                $scope.data_accelerometer_y[0].push($scope.accelerometer.ay);
                $scope.data_accelerometer_y[0].shift();
                $scope.data_accelerometer_z[0].push($scope.accelerometer.az-1);
                $scope.data_accelerometer_z[0].shift();
            }
            if(data.gyro){
                $scope.gyroscope = {
                  roll: data.gyro[0],
                  pitch: data.gyro[1],
                  yaw: data.gyro[2]
                };
                $scope.data_gyroscope_x[0].push($scope.gyroscope.roll);
                $scope.data_gyroscope_x[0].shift();
                $scope.data_gyroscope_y[0].push($scope.gyroscope.pitch);
                $scope.data_gyroscope_y[0].shift();
                $scope.data_gyroscope_z[0].push($scope.gyroscope.yaw);
                $scope.data_gyroscope_z[0].shift();
            }
            if(data.compass){
                $scope.compass = {
                  compass1: data.compass[0],
                  compass2: data.compass[1],
                  compass3: data.compass[2]
                };
                $scope.data_compass_x[0].push($scope.compass.compass1);
                $scope.data_compass_x[0].shift();
                $scope.data_compass_y[0].push($scope.compass.compass2);
                $scope.data_compass_y[0].shift();
                $scope.data_compass_z[0].push($scope.compass.compass3);
                $scope.data_compass_z[0].shift();
            }
            if(data.fusionPose){
                $scope.fusionPose.roll = (data.fusionPose[0]*180/3.14);
                $scope.fusionPose.pitch = (data.fusionPose[1]*180/3.14);
                if (data.fusionPose[2] >= -3.14159/2) {
                    data.fusionPose[2] = data.fusionPose[2] - 3.14159/2
                } else {
                    data.fusionPose[2] = data.fusionPose[2] + 3.14159*3/2
                }
                $scope.fusionPose.yaw = (data.fusionPose[2]*180/3.14);
                $scope.fusionPose.yaw  = $scope.fusionPose.yaw.toFixed(6);

                $scope.data_fusion_pose_roll[0].push($scope.fusionPose.roll);
                $scope.data_fusion_pose_roll[0].shift();
                $scope.data_fusion_pose_pitch[0].push($scope.fusionPose.pitch);
                $scope.data_fusion_pose_pitch[0].shift();
                $scope.data_fusion_pose_yaw[0].push($scope.fusionPose.yaw);
                $scope.data_fusion_pose_yaw[0].shift();
            }
             $scope.figureStyle0={
                  'transform':' rotateZ( '+$scope.theta_target+'deg ) '
             };
             $scope.figureStyle1={
                  'transform':' rotateZ( '+$scope.fusionPose.roll+'deg ) '
             };
             $scope.figureStyle2={
                  'transform': 'rotateZ( '+$scope.fusionPose.pitch+'deg ) '
             };
             $scope.figureStyle3={
                  'transform': 'rotateZ( '+$scope.fusionPose.yaw+'deg )'
             };
             $scope.altitude = data.altitude;
             $scope.data_altitude[0].push($scope.altitude);
             $scope.data_altitude[0].shift();

             $scope.link = true;

         });
        socket.emit('my other event', { my: 'data' });
     });


     $scope.flagMotors = false;
     $scope.mouseDownGo = function(){
         $scope.flagMotors = true;
     };
     $scope.mouseUpGo = function(){
         $scope.flagMotors = false;
     };

    $scope.start_mission = function(){
        console.log("Command");
        socket.emit('task', { typeTask: 'start_mission' });
    };

    var coors = [];

    $scope.latitude = 41.882409;
    $scope.longitude =12.578443;

    $scope.latTarget = 41.881728;
    $scope.lonTarget = 12.578192;

    $scope.count = 0;
    $scope.setTargetCoordinates = function(longitude,latitude){
        // console.log(longitude,latitude);
        $scope.mapData.target = {
            latitude:latitude,
            longitude:longitude
        }
        $scope.mapData.position=(coors[$scope.count]);
        $scope.count = $scope.count + 1;
        socket.emit('task', { typeTask: 'target_coordinates', longitude: longitude, latitude:latitude});
        $scope.task = 6;
    };


});
