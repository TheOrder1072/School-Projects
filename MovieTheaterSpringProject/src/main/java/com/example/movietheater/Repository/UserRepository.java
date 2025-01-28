package com.example.movietheater.Repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.example.movietheater.Entity.User;

public interface UserRepository extends JpaRepository<User, Long>{

	User findByEmail(String email);
}