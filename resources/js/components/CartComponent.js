import React from 'react';
import {useCart} from "react-use-cart";
import axios from "axios";

const CartComponent = () => {
    const {
        isEmpty,
        totalUniqueItems,
        items,
        updateItemQuantity,
        removeItem,
        cartTotal,
        totalItems,
        emptyCart
    } = useCart();

    const handleSubmit = () => {
        const data = localStorage.getItem('react-use-cart');
        axios.post(`/api/products`, {data}).then((res) => {
            if (res.data.success) {
                alert(res.data.message);
                emptyCart();
            }
        }).catch(e => console.log(e));
    };

    if (isEmpty) return <p>Your cart is empty</p>;

    return (
        <div>
            <div className="table-responsive">
                <table className="table table-hover">
                    <thead>
                    <tr>
                        <th>Mal adi</th>
                        <th>Qiy</th>
                        <th>Miq</th>
                        <th>Meb</th>
                        <th>Sil</th>
                    </tr>
                    </thead>
                    <tbody>
                    {
                        items.map((item) => (
                            <tr key={item.id}>
                                <td>{item.name}</td>
                                <td>{item.price}</td>
                                <td>
                                    <button onClick={() => updateItemQuantity(item.id, item.quantity - 1)}>
                                        -
                                    </button>
                                    {item.quantity}
                                    <button onClick={() => updateItemQuantity(item.id, item.quantity + 1)}>
                                        +
                                    </button>
                                </td>
                                <td>{(item.quantity * item.price).toFixed(2)}</td>
                                <td>
                                    <button onClick={() => removeItem(item.id)}>&times;</button>
                                </td>
                            </tr>
                        ))
                    }
                    </tbody>
                </table>
            </div>
            <hr/>
            Total Cart {cartTotal.toFixed(2)} AZN <br/>
            Total Qty ({totalItems})<br/>
            <button type="button" className="btn btn-success" onClick={() => emptyCart()}>Satışı ləğv et</button> |
            <button type="button" className="btn btn-success" onClick={() => handleSubmit()}>Satışı Tamamla</button>
        </div>
    )
};
export default CartComponent;
