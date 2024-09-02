<?php

namespace app\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\ResourceManage;

class CategoryController extends Controller
{
    use ResourceManage;

    public function __construct()
    {
        $this->model = new Category();
        $this->name = 'Category';
        $this->view = 'backend.modules.category.';
        $this->route = 'category.';

    }

    public function importX()
    {
        $supermarketCategories = [
            "Fresh Produce" => [
                "Fruits",
                "Vegetables",
                "Fresh Herbs"
            ],
            "Dairy" => [
                "Milk",
                "Cheese",
                "Yogurt",
                "Butter & Margarine",
                "Eggs"
            ],
            "Meat & Seafood" => [
                "Beef",
                "Pork",
                "Chicken",
                "Turkey",
                "Lamb",
                "Fish",
                "Shellfish",
                "Deli Meats"
            ],
            "Bakery" => [
                "Bread",
                "Rolls & Buns",
                "Bagels & Muffins",
                "Cakes & Pastries",
                "Cookies"
            ],
            "Pantry Staples" => [
                "Pasta & Noodles",
                "Rice & Grains",
                "Canned Goods",
                "Sauces & Condiments",
                "Spices & Seasonings",
                "Baking Supplies",
                "Oil & Vinegar"
            ],
            "Beverages" => [
                "Water",
                "Soft Drinks",
                "Juices",
                "Tea",
                "Coffee",
                "Alcoholic Beverages" => [
                    "Beer",
                    "Wine",
                    "Spirits"
                ]
            ],
            "Frozen Foods" => [
                "Frozen Vegetables",
                "Frozen Fruits",
                "Frozen Meals",
                "Ice Cream & Desserts",
                "Frozen Meat & Seafood"
            ],
            "Snacks" => [
                "Chips & Pretzels",
                "Nuts & Seeds",
                "Cookies & Crackers",
                "Candy & Chocolate"
            ],
            "Health & Beauty" => [
                "Personal Care" => [
                    "Shampoo",
                    "Soap"
                ],
                "Oral Care" => [
                    "Toothpaste",
                    "Mouthwash"
                ],
                "Skincare",
                "Hair Care",
                "Health Supplements"
            ],
            "Household Essentials" => [
                "Cleaning Supplies",
                "Paper Products" => [
                    "Toilet Paper",
                    "Paper Towels"
                ],
                "Laundry Supplies",
                "Dishwashing Supplies"
            ],
            "Baby & Childcare" => [
                "Baby Food",
                "Diapers & Wipes",
                "Baby Care Products"
            ],
            "Pet Supplies" => [
                "Pet Food",
                "Pet Treats",
                "Pet Care Products"
            ],
            "International Foods" => [
                "Asian Cuisine",
                "Latin American Cuisine",
                "European Cuisine",
                "Middle Eastern Cuisine"
            ],
            "Organic & Specialty" => [
                "Organic Produce",
                "Gluten-Free Products",
                "Vegan & Vegetarian Products"
            ],
            "Miscellaneous" => [
                "Flowers & Plants",
                "Seasonal Items",
                "Greeting Cards & Gift Wrap"
            ]
        ];

        foreach ($supermarketCategories as $parent => $children) {

            $parentCategory = new Category();
            $parentCategory->slug = $this->textToSlug($parent);
            $parentCategory->title = $parent;
            $parentCategory->short_description = $parent;
            $parentCategory->description = $parent;
            $parentCategory->save();

            if (is_array($children)) {
                foreach ($children as $childKey => $childValue) {
                    if (is_array($childValue)) {
                        $level2 = new Category();
                        $level2->slug = $this->textToSlug($childKey);
                        $level2->title = $childKey;
                        $level2->category_id = $parentCategory->id;
                        $level2->short_description = $childKey;
                        $level2->description = $childKey;
                        $level2->save();

                        foreach ($childValue as $grandChild) {
                            $level3 = new Category();
                            $level3->slug = $this->textToSlug($grandChild);
                            $level3->title = $grandChild;
                            $level3->category_id = $level2->id;
                            $level3->short_description = $grandChild;
                            $level3->description = $grandChild;
                            $level3->save();
                        }
                    } else {
                        $level2 = new Category();
                        $level2->slug = $this->textToSlug($childValue);
                        $level2->title = $childValue;
                        $level2->category_id = $parentCategory->id;
                        $level2->short_description = $childValue;
                        $level2->description = $childValue;
                        $level2->save();
                    }
                }
            }
        }
    }
}
