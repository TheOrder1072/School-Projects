package com.example.restaurant.repository;

import com.example.restaurant.entity.Customer;


import org.springframework.data.jpa.repository.JpaRepository;

public interface CustomerRepository extends JpaRepository<Customer, Long> {
}
