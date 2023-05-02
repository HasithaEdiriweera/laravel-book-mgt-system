<?php

namespace App\Gates;

use App\Validators\AuthValidator;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

trait AuthorGates
{
    public function getAuthorGates()
    {
         // author gates
         Gate::define('author-read-one', function () {
            if(AuthValidator::isUser() || AuthValidator::isAdmin() ){
                return Response::allow();
            }else {
                return Response::deny();
            }
        });

        Gate::define('author-read-all', function () {
            if(AuthValidator::isUser()|| AuthValidator::isAdmin() ){
                return Response::allow();
            }else {
                return Response::deny();
            }
        });

        Gate::define('author-create', function () {
            if(AuthValidator::isAdmin()){
                return Response::allow();
            }else{
                return Response::deny();
            }
        });

        Gate::define('author-update', function () {
            if(AuthValidator::isAdmin()){
                return Response::allow();
            }else{
                return Response::deny();
            }
        });

        Gate::define('author-delete', function () {
            if(AuthValidator::isAdmin()){
                return Response::allow();
            }else{
                return Response::deny();
            }
        });
    }
}
