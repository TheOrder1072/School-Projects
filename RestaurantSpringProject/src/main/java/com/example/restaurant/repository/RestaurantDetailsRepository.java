package com.example.restaurant.repository;

import com.example.restaurant.entity.RestaurantDetails;
import org.springframework.data.jpa.repository.JpaRepository;

public interface RestaurantDetailsRepository extends JpaRepository<RestaurantDetails, Long> {
}
