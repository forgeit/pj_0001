(function () {
	'use strict';

	angular
		.module('app.demanda')
		.factory('demandaRest', dataservice);

	dataservice.$inject = ['$http', '$location', '$q', 'configuracaoREST', '$httpParamSerializer'];

	function dataservice($http, $location, $q, configuracaoREST, $httpParamSerializer) {
		var service = {
			buscar: buscar,
			buscarTodos: buscarTodos,
			salvar: salvar
		};

		return service;

		function buscar(data) {
			return $http.get(configuracaoREST.url + configuracaoREST.demanda + 'buscar/' + data);
		}

		function buscarTodos(data) {
			return $http.get(configuracaoREST.url + configuracaoREST.demanda);
		}

		function salvar(data) {
			return $http.post(configuracaoREST.url + configuracaoREST.demanda + 'salvar', data);
		}
	}
})();