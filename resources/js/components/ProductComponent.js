import React, {useState, useEffect} from 'react';
import axios from 'axios';
import {useCart} from "react-use-cart";

const ProductComponent = () => {
    const {addItem} = useCart();
    const [products, setProducts] = useState([]);

    useEffect(() => {
        axios.get(`/api/products`).then((res) => {
            if (res.data.success) {
                setProducts(res.data.products);
            }
        }).catch(e => console.log(e));
    }, []);

    return (
        <div>
            <div className="row">
                {
                    products.map((item) => (
                        <div className="col-4" key={item.id}>
                            <div className="shadow-lg p-3 mb-5 bg-body rounded">
                                <h4>{item.name}</h4>
                                <p>{item.price} AZN</p>
                                <button
                                    type="button"
                                    className="btn btn-primary"
                                    onClick={() => addItem(item)}>
                                    Add to cart
                                </button>
                            </div>
                        </div>
                    ))
                }
            </div>
        </div>
    )
};
export default ProductComponent;
