angular.module('starter.services')
    .service('$cart', ['$localStorage', function ($localStorage) {

        var key = 'cart', cartAux = $localStorage.getObject(key);

        if(!cartAux)
        {
            initCart();
        }

        //LIMPAR CARRINHO
        this.clear = function () {
            initCart();
        };

        //PEGAR CARRINHO
        this.get = function () {
            return $localStorage.getObject(key);
        };

        //PEGAR ITEM
        this.getItem = function (i) {
            return this.get().items[i];
        };

        //ADICIONAR ITEM
        this.addItem = function (item) {
            var cart = this.get(), itemAux, exists = false;
            //PERCORRER CARRINHO
            for(var index in cart.items)
            {
                //AUX RECEBE O ITEM DA VEZ
                itemAux = cart.items[index];
                //VERIFICA SE EH IGUAL O ITEM Q ESTAMOS PASSANDO
                if(itemAux.id == item.id)
                {
                    //ENCONTROU ALTERA A QUANTIDADE
                    itemAux.qtd = item.qtd + itemAux.qtd;
                    itemAux.subtotal = calculateSubTotal(itemAux);
                    exists = true;
                    break;
                }
            }
            //NAO ENCONTROU ADICIONA UM NOVO
            if(!exists)
            {
                item.subtotal = calculateSubTotal(item);
                cart.items.push(item);
            }
            cart.total = getTotal(cart.items);
            //SETANDO NO LOCALSTORAGE
            $localStorage.setObject(key, cart);
        };

        //REMOVER ITEM - splic - remove item do array
        this.removeItem = function (i) {
            var cart = this.get();
            cart.items.splice(i, 1);
            cart.total = getTotal(cart.items);
            $localStorage.setObject(key, cart);
        };

        //ATUALIZAR A QUANTIDADE DO ITEM
        this.updateQtd = function(i, qtd) {
            var cart = this.get(),
                itemAux = cart.items[i];
            itemAux.qtd = qtd;
            itemAux.subtotal = calculateSubTotal(itemAux);
            cart.total = getTotal(cart.items);
            $localStorage.setObject(key, cart);
        }

        function calculateSubTotal(item){
            return item.price * item.qtd;
        }

        function getTotal(items){
            var sum = 0;
            angular.forEach(items, function(item){
                sum += item.subtotal;
            });
            return sum;
        }


        function initCart(){
            $localStorage.setObject(key, {
                items: [],
                total: 0
            });
        }

}]);
