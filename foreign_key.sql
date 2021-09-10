ALTER TABLE table_name
    ADD CONSTRAINT fk_foreign_key_name
    FOREIGN KEY (foreign_key_name)
    REFERENCES target_table(target_key_name);