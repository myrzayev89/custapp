import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import { CartProvider } from "react-use-cart";
import Cart from './components/CartComponent';
import Product from './components/ProductComponent';

class Index extends Component {
    render() {
        return (
            <div>
                <div className="row">
                    <CartProvider>
                        <div className="col-6"><Cart/></div>
                        <div className="col-6"><Product/></div>
                    </CartProvider>
                </div>
            </div>
        )
    }
}
ReactDOM.render(<Index/>,document.getElementById('index'));
